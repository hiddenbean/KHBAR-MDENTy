<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function regions()
    {
        return $this->belongsToMany('App\Region')->withTimestamps();
    }
}
