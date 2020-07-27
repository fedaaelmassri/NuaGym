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
    //programs
    public function programs()
    {
        return $this->belongsToMany(programs::class,'coaches_programs','coache_id','program_id');
    }
    public function events()
    {
        return $this->belongsToMany(Events::class,'coache_events','coache_id','event_id');
    }
    public function members()
    {
        return $this->belongsToMany(members::class,'member_programs','coache_id','member_id');
    }
  
}
