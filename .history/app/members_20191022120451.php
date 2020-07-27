<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User ;

class members extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [
     'employee_password', 'remember_token',
    ];
    public function getAuthPassword()
    {
     return $this->employee_password;
    }
}
