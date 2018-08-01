<?php

use Faker\Generator as Faker;

$factory->define(App\Reaction::class, function (Faker $faker) {
    return [
        'reaction_id' => 1,
        'reactionable_id' => 1,
        'reactionable_type' => 'video',
        'userable_id' => 1,
        'userable_type' => 'partner',
        'khbar_id' => 1,
    ];
});
