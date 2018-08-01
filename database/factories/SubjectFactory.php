<?php

use Faker\Generator as Faker;

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'title' => str_random(10),
        'description' => str_random(100),
        'topic_id' => 1,
    ];
});
