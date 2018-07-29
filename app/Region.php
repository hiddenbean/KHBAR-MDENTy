<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name', 'partner_id'];


    public function subjects()
    {
        return $this->belongsToMany('App\Subject')->withTimestamps();
    }
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
}
