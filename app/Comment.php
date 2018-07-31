<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function reaction()
    {
        return $this->morphOne('App\Reaction', 'reactionable');
    }
    public function intervention()
    {
        return $this->morphOne('App\Intervention', 'intervention');
    }
}
