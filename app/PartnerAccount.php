<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerAccount extends Authenticatable
{
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
}
