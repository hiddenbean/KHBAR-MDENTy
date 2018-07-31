<?php

use Faker\Generator as Faker;

$factory->define(App\Reason::class, function (Faker $faker) {
    return [
        'title' => str_random(10),
        'description' => str_random(500),
        
    ];
});
