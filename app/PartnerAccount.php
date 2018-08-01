<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerAccount extends Authenticatable
{
    use notifiable;
    
    protected $guard="partner-account";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'name',
        'status',
        'partner_id',
    ];

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
    
    public function reactions()
    {
        return $this->morphMany('App\Reaction', 'userable');
    }


    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
}
