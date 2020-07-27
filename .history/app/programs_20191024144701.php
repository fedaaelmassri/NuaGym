<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programs extends Model
{
    //

    public function members()
    {
        return $this->belongsToMany(members::class,'member_programs','program_id','member_id');
    }
}
