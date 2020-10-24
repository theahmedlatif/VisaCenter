<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicantName', 'passportNumber', 'nationality', 'creator_id', 'owner_id', 'status_id',
    ];


    public function status(){
        return $this->belongsTo(Status::class,'status_id','id');
    }

    public function created_by(){
        return $this->belongsTo(User::class,'creator_id','id');
    }

    public function handled_by(){
        return $this->belongsTo(User::class,'owner_id','id');
    }


}
