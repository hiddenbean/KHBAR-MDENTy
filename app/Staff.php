<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Staff extends Model
{
    protected $guard = 'staffs';
    
    protected $fillable = [
        'email',
        'password',
        'name',
        'status',
        'last_name',
        'first_name',
        'title',
        'staff_number',
        'staff_role', 
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
