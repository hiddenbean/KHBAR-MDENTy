<?php

use Faker\Generator as Faker;

$factory->define(App\CountryCode::class, function (Faker $faker) {
    return [
        'country_code' => '+212',
        'country' => 'maroc',
       
    ];
});
