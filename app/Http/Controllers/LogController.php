<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    /**
     * log resource creation transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function logCreation($log){

        foreach ($log as $key => $value){
            if($key!='updated_at' and $key!='id'){
                Log::create([
                    'passport_id' => $log['id'],
                    'field_name' => $key,
                    'value' => $value,
                    'updated_by' => Auth::user()->id,
                    'transaction_name'=> 'create',
                ]);
            }
        }
    }


    /**
     * log resource update transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function logUpdate($log){

        foreach ($log as $key => $value){
            if($key!='id' and isset($value)){
                Log::create([
                    'passport_id' => $log['id'],
                    'field_name' => $key,
                    'value' => $value,
                    'updated_by' => Auth::user()->id,
                    'transaction_name'=> 'update',
                ]);
            }
        }
    }

}
