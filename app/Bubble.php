<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bubble extends Model
{
    protected $fillable = ['radius_id', 'coordinate_id', 'bubbleable_id', 'bubbleable_type'];

    public function bubbleable()
    {
        return $this->morphTo();
    }

    public function Coordinate()
    {
        return $this->belongsTo('App\Coordinate');
    }

    public function radius()
    {
        return $this->belongsTo('App\Radius');
    }
}
