<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public function statues()
    {
        return $this->hasMany('App\Status');
    }
}
