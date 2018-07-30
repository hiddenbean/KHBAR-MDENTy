<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionPoint extends Model
{
    protected $fillable = ['longitude', 'latitude', 'region_id'];

    public function Region()
    {
        return $this->belongsTo('App\Region');
    }
}
