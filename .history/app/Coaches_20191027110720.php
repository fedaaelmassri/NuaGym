<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coaches extends Model
{
    protected $fillable = [
        'name', 'email', 'password','mobile','identity', 'city', 'country', 'address',
    ];
    protected $hidden = [
        'password', 'remember_token',
       ];
    //
}
