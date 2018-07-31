<?php

use Faker\Generator as Faker;

$factory->define(App\Phone::class, function (Faker $faker) {
    return [
        'number' =>'061235104',
        'type'=> 'fix',
        'code_country_id'=> 1,
        'phoneable_type' => 'partner',
        'phoneable_id' => 1,
    ];
});
