<?php

use Faker\Generator as Faker;

$factory->define(App\Coordinate::class, function (Faker $faker) {
    return [
        'longitude' => '-6.614384468750018',
        'latitude' => '33.516182538616825',
    ];
});
