<?php

use Faker\Generator as Faker;

$factory->define(App\RegionPoint::class, function (Faker $faker) {
    return [
        'longitude' => 33.935866,
        'latitude' => -6.928503, 
        'region_id' => 1, 
    ];
});
