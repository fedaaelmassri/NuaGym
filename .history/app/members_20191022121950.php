<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class members extends Model
{
    protected $fillable = [
        'name', 'email', 'password','mobile','identity', 'city', 'country', 'address',
    ];

     protected $hidden = [
     'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
     return $this->password;
    }
}
