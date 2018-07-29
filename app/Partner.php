<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['company_name', 'name', 'about', 'trade_registry', 'ice', 'tax_id'];

    public function statues()
    {
        return $this->hasMany('App\Status');
    }

    public function partnerAccounts()
    {
        return $this->hasMany('App\Partner');
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function Regions()
    {
        return $this->hasMany('App\Region');
    }

    public function Pictures()
    {
        return $this->hasMany('App\Picture');
    }

    public function Phones()
    {
        return $this->hasMany('App\Phone');
    }
}
