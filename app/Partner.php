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
        return $this->hasMany('App\PartnerAccount');
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    public function regions()
    {
        return $this->hasMany('App\Region');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }

    public function phones()
    {
        return $this->morphMany('App\Phone', 'phoneable');
    }

    public function khbar()
    {
        return $this->hasOne('App\Khbar');
    }
}
