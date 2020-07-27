<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscriptions extends Model
{
    protected $fillable = [
        'payable_id', 'member_id','cost','payable_type','status','coache_id'
       ];

    //
}
