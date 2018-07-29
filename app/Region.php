<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    // SoftDeletes
    use SoftDeletes;

    protected $fillable = ['name', 'partner_id'];


    public function subjects()
    {
        return $this->belongsToMany('App\Subject')->withTimestamps();
    }
    public function partner()
    {
        return $this->belongsTo('App\Partner');
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
