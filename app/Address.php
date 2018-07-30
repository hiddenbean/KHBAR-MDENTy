<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address', 'adress_two', 'full_name', 'country', 'city', 'zip_code', 'longitude', 'latitude', 'addressable_type', 'addressable_id'];

    public function addressable()
    {
        return $this->morphTo();
    }
}
