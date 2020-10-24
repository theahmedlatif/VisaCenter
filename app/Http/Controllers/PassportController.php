<?php

namespace App\Http\Controllers;

use App\Log;
use App\Passport;
use App\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LogController;
class PassportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.passreceive');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'applicantName' => 'required|max:255|alpha',
            'passportNumber' => 'required|max:255|alpha_num',
            'nationality' => 'required|max:255|alpha',
        ]);

        if ($validator->fails()) {
            return redirect()->route('staff.passport')
                ->withErrors($validator)
                ->withInput();
        }
        $passport = Passport::create([
            'applicantName' => $request->applicantName,
            'passportNumber' => $request->passportNumber,
            'nationality' => $request->nationality,
            'creator_id' => Auth::user()->id,
        ]);

        $item = $passport->getOriginal();
        $log = new LogController;
        $log->logCreation($item);

        return redirect(route('staff.passport.show',$passport->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function show($passport_id)
    {
        $passport = Passport::with('created_by')->with('status')->with('handled_by')
            ->where('id',$passport_id)->first();
        $statuses = Status::all();
        $logs = Log::with('passports')->with('editor')
            ->where('passport_id',$passport_id)->get();

        return view('staff.passview',compact('passport'))
            ->with('statuses',$statuses)
            ->with('logs',$logs);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function edit($passport_id)
    {
        $passport = Passport::with('created_by')->with('status')->with('handled_by')
                        ->where('id',$passport_id)->first();
        $statuses = Status::all();
        $logs = Log::with('passports')->with('editor')
            ->where('passport_id',$passport_id)->get();
        return view('staff.passhandle',compact('passport'))
            ->with('statuses',$statuses)
            ->with('logs',$logs);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function update($passport_id, Request $request)
    {
        $passport = Passport::findOrfail($passport_id);

        $validator =
            Validator::make($request->all(), [
            'status_id' => 'exists:statuses,id|required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('staff.passport.edit',$passport->id)
                ->withErrors($validator)
                ->withInput();
        }

        $passport->status_id = $request->status_id;
        $passport->owner_id = Auth::user()->id;
        $passport->details = $request->details;
        $passport->save();
        $item = [
                'id' => $passport_id,
                'status_id' => $passport->status_id,
                'owner_id' => $passport->owner_id,
                'details' => $passport->details,
                ];

        $log = new LogController;
        $log->logUpdate($item);

        return redirect(route('staff.passport.show',$passport_id));
    }

    /**
     * Display the specified resource.
     *
     * @return Query view
     */
    public function passportsQueryInput()
    {
        $users = User::all();
        $statuses = Status::all();
        return view('staff.passquery')->with('users',$users)->with('statuses',$statuses);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function passportsQueryOutput(Request $request)
    {
        $filters = [
            'creator_id' => $request->creator_id,
            'owner_id' => $request->owner_id,
            'status_id' => $request->status_id,
        ];

        $dateToAddingOneDay = Carbon::parse($request->dateTo)->addDay();

        $passports = Passport::with('created_by')->with('status')->with('handled_by')
            ->whereBetween('created_at',[$request->dateFrom, $dateToAddingOneDay])
            ->where(function($query) use ($request, $filters){
                foreach ($filters as $column => $key){
                    $query->when(($key), function($query,$value) use ($column){
                        $query->where($column,$value);
                    });
                }
            })
            ->get();
        return view('staff.passqueryoutput')->with('passports',$passports);
    }

    /**
     * Show the form for assigning the specified resource.
     *
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function assignPassport($passport_id)
    {
        $passport = Passport::with('created_by')->with('status')->with('handled_by')
            ->where('id',$passport_id)->first();
        $statuses = Status::all();
        $users = User::all()
            ->where('role_id','=',3);

        return view('staff.passassign',compact('passport'))
            ->with('statuses',$statuses)
            ->with('users',$users);
    }

    /**
     * Show the form for assigning the specified resource.
     *
     * @param  \App\Passport  $passport
     * @return \Illuminate\Http\Response
     */
    public function assignPassportUpdate($passport_id, Request $request)
    {
        $passport = Passport::findOrfail($passport_id);

        $validator =
            Validator::make($request->all(), [
                'owner_id' => 'exists:users,id|required',
            ]);

        if ($validator->fails()) {
            return redirect()->route('staff.passport.assign',$passport->id)
                ->withErrors($validator)
                ->withInput();
        }

        $passport->owner_id = $request->owner_id;
        $passport->details = $request->details;
        $passport->save();

        $item = [
            'id' => $passport_id,
            'owner_id' => $passport->owner_id,
            'details' => $passport->details,
        ];

        $log = new LogController;
        $log->logUpdate($item);

        return redirect(route('staff.passport.show',$passport_id));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myPassports()
    {
        $passports = Passport::with('created_by')->with('status')->with('handled_by')
            ->where('owner_id','=',Auth::user()->id)
            ->where('status_id','<',3)
            ->get();

        return view('staff.mypassports')->with('passports',$passports);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myHandledPassports()
    {
        $passports = Passport::with('created_by')->with('status')->with('handled_by')
            ->where('owner_id',Auth::user()->id)
            ->where('status_id','>',2)
            ->get();

        return view('staff.myhandledpassports')->with('passports',$passports);
    }

    public function figuresDashboard()
    {
        return view('reports.dashboard');
    }
}
