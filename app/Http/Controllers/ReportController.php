<?php

namespace App\Http\Controllers;

use App\Passport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReceivedPassports(){
        return Passport::where('status_id','=',1)
            ->count();
    }

    public function getReceivedPassportsWithoutOwner(){
        return Passport::where('status_id','=',1)
            ->where('owner_id','=',NULL)
            ->count();
    }

    public function getPendingPassports(){
        return Passport::where('status_id','=',2)
            ->count();
    }

    public function getApprovedPassports(){
        return Passport::where('status_id','=',3)
            ->count();
    }

    public function getRejectedPassports(){
        return Passport::where('status_id','=',4)
            ->count();
    }

    public function getReceivedPassportsToday(){
        return Passport::where('status_id','=',1)
            ->where('updated_at','=',today())
            ->count();
    }

    public function getReceivedPassportsWithoutOwnerToday(){
        return Passport::where('status_id','=',1)
            ->where('owner_id','=',NULL)
            ->where('updated_at','=',today())
            ->count();
    }

    public function getPendingPassportsToday(){
        return Passport::where('status_id','=',2)
            ->where('created_at','=',today())
            ->count();
    }

    public function getApprovedPassportsToday(){
        return Passport::where('status_id','=',3)
            ->where('updated_at','=',today())
            ->count();
    }

    public function getRejectedPassportsToday(){
        return Passport::where('status_id','=',4)
            ->where('updated_at','=',today())
            ->count();
    }

    public function dashboard(){
        $values = [
            'getReceivedPassportsToday' => $this->getReceivedPassportsToday(),
            'getReceivedPassportsWithoutOwnerToday' => $this->getReceivedPassportsWithoutOwnerToday(),
            'getPendingPassportsToday' => $this->getPendingPassportsToday(),
            'getApprovedPassportsToday' => $this->getApprovedPassportsToday(),
            'getRejectedPassportsToday' => $this->getRejectedPassportsToday(),

            'getReceivedPassports' => $this->getReceivedPassports(),
            'getReceivedPassportsWithoutOwner' => $this->getReceivedPassportsWithoutOwner(),
            'getPendingPassports' => $this->getPendingPassports(),
            'getApprovedPassports' => $this->getApprovedPassports(),
            'getRejectedPassports' => $this->getRejectedPassports(),
        ];

        return view('reports.dashboard')->with('values',$values);
    }
}
