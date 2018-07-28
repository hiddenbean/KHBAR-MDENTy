<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
   
    public function statuses()
    {
        return $this->belongsToMany('App\Status')->withTimestamps();
    }
}
