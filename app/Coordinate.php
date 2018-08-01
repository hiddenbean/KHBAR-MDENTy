<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    protected $fillable = ['longitude', 'latitude'];

    public function khbar()
    {
        return $this->hasOne('App\Khbar');
    }

    public function citizen()
    {
        return $this->hasOne('App\Citizen');
    }

    public function bubble()
    {
        return $this->hasOne('App\Bubble');
    }
}
