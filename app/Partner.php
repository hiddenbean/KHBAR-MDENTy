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
    public function regions()
    {
        return $this->hasMany('App\Region');
    }
}
