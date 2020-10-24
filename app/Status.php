<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'statusName',
    ];

    public function passports(){
        return $this->hasMany(Passport::class);
    }
}
