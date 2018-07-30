<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    public function reactions()
    {
        return $this->morphMany('App\Reaction', 'reactionable');
    }
}
