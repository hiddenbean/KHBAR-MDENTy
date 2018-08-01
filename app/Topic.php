<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;  

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function khbar()
    {
        return $this->hasOne('App\Khbar');
    }

    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleting(function($topic)
        {
            $topic->subjects()->delete();
            
        });

        static::restoring(function($topic)
        {
            $topic->subjects()->withTrashed()->restore();
        });
    }
}
