<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member_programs extends Model
{
    //
    // protected $attributes = [
    //     'member_id' => 1,
    //  ];
    protected $fillable = [
        'program_id', 'coache_id','member_id'
       ];




}
