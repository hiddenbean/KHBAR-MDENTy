<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khbar extends Model
{
    protected $table = 'khbarat';

    protected $fillable = ['name', 'title', 'partner_id', 'subject_id'];
    
    public function bubble()
    {
        return $this->morphOne('App\Bubble', 'bubbleable');
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

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
}
