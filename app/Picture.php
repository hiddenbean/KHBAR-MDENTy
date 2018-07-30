<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['name', 'tag', 'extension', 'path', 'pictureable_type', 'pictureable_id'];

    public function reaction()
    {
        return $this->morphOne('App\Reaction', 'reaction');
    }
    
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
}
