<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachesPrograms extends Model
{
    //
    protected $fillable = [
     'program_id', 'coache_id',
    ];

}
