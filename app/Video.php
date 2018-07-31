<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function reaction()
    {
        return $this->morphOne('App\Reaction', 'reaction');
    }
    public function intervention()
    {
        return $this->morphOne('App\Intervention', 'intervention');
    }
}
