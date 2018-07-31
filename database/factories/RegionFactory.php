<?php

use Faker\Generator as Faker;

$factory->define(App\Region::class, function (Faker $faker) {
    return [
        'name' => str_random(10),
        'partner_id' => 1, 
    ];
});
