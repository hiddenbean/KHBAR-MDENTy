<?php

use Faker\Generator as Faker;

$factory->define(App\Radius::class, function (Faker $faker) {
    return [
        'radius' => '1000',
        //
    ];
});
