<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReactionPicture extends Model
{
    public function reaction()
    {
        return $this->morphOne('App\Reaction', 'reactionable');
    }

    public function intervention()
    {
        return $this->morphOne('App\Intervention', 'interventionable');
    }
}
