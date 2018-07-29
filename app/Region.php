<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    // SoftDeletes
    use SoftDeletes;

    protected $fillable = ['name', 'partner_id'];


    public function topics()
    {
        return $this->belongsToMany('App\Topic')->withTimestamps();
    }

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function regionPoints()
    {
        return $this->hasMany('App\RegionPoint');
    }
}
