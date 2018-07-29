<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;  

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function regions()
    {
        return $this->belongsToMany('App\Region')->withTimestamps();
    }
}
