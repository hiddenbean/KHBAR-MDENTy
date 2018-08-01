<?php

use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'title' => str_random(10),
        'description' => str_random(100),
    ];
});
