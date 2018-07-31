<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    public function interventionable()
    {
        return $this->morphTo();
    }
}
