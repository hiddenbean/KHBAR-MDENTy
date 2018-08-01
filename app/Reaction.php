<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    public function reactionable()
    {
        return $this->morphTo();
    }

    public function userable()
    {
        return $this->morphTo();
    }

    public function Khbar()
    {
        return $this->belongsTo('App\Khbar');
    }

    public function bubble()
    {
        return $this->morphOne('App\Bubble', 'bubbleable');
    }

    public function parent()
    {
        return $this->belongsTo('App\Reaction', 'reaction_id');
    }

    public function children()
    {
        return $this->hasMany('App\Reaction', 'reaction_id');
    }
}
