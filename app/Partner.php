<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use this notification to sen an email to a specific user
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Authenticatable
{
    protected $guard="partner";
    protected $fillable = [
        'email',
        'password',
        'name',
        'status',
    ];
}
