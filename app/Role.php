<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titleName',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
