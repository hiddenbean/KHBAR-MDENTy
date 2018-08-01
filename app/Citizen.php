<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Citizen extends Model
{
    use notifiable;

    protected $guard = 'citizen';

    public function reactions()
    {
        return $this->morphMany('App\Reaction', 'userable');
    }

    public function coordinate()
    {
        return $this->belongsTo('App\Coordinate');
    }
}
