<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    public function coaches()
    {
        return $this->belongsToMany(Coaches::class,'coache_events','event_id','coache_id');
    }

}
