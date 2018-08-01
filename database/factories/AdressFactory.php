<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'address' => str_random(50),
        'address_two' => str_random(50),
        'country' => str_random(10),
        'city' => str_random(10),
        'full_name' => str_random(10),
        'zip_code' => str_random(10),
        'addressable_id' => 1,
        'addressable_type' => 'partner',
        'longitude' => 33.935866,
        'latitude' => -6.928503, 
      
    ];
});
