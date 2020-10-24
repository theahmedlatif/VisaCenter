<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'passport_id','field_name','value','updated_by','transaction_name',
    ];

    public function passports(){
        return $this->belongsTo(Passport::class,'passport_id', 'id');
    }

    public function editor(){
        return $this->belongsTo(User::class,'updated_by', 'id');
    }
}
