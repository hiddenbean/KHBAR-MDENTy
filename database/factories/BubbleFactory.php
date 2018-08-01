<?php

use Faker\Generator as Faker;

$factory->define(App\Bubble::class, function (Faker $faker) {
    return [
        'coordinate_id' => '1',
        'radius_id' => '1',
        'bubbleable_id' => '1',
        'bubbleable_type' => 'khbar',
    ];
});
