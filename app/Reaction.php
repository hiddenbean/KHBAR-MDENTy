<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    public function reactionable()
    {
        return $this->morphTo();
    }

    public function reaction()
    {
        return $this->morphTo();
    }
}
