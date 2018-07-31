<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khbar extends Model
{
    protected $table = 'khbarat';

    protected $fillable = ['title', 'coordinate_id', 'partner_id', 'subject_id'];
    
    public function coordinate()
    {
        return $this->belongsTo('App\Coordinate');
    }

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function reactions()
    {
        return $this->hasMany('App\Reaction');
    }
}
