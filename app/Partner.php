<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['company_name', 'name', 'about', 'trade_registry', 'ice', 'tax_id'];
}
