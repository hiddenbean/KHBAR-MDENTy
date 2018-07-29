<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name', 'partner_id'];


    public function topics()
    {
        return $this->belongsToMany('App\Topic')->withTimestamps();
    }
}
