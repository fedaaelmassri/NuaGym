<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class members extends Authenticatable
{
    protected $fillable = [
        'name', 'email',  'password','mobile','identity','date_of_birth' ,'gender', 'city', 'country', 'address',
    ];

    protected $guard = 'members';
    protected $hidden = [
     'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
     return $this->password;
    }
    public function programs()
    {
        return $this->belongsToMany(programs::class,'member_programs','member_id','program_id');
    }
}
