<?php

use Faker\Generator as Faker;

$factory->define(App\Khbar::class, function (Faker $faker) {
    return [
        'title' => str_random(10),
        'coordinate_id' => '1',
        'partner_id' => '1',
        'subject_id' => '1',
    ];
});
