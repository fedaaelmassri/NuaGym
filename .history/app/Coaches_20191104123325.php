<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coaches extends Model
{
    protected $fillable = [
        'name', 'email', 'password','mobile','identity', 'city', 'country', 'address','image'
    ];
    protected $hidden = [
        'password', 'remember_token'
       ];
    //
    public function programs()
    {
        return $this->belongsToMany(programs::class,'CoachesPrograms','coache_id','program_id');
    }
}
