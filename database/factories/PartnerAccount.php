<?php

use Faker\Generator as Faker;

$factory->define(App\PartnerAccount::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$MwCBUoznXI9cK9qYIh8HMeNTRTkGW26X0ZPpW5QF9ZEOrKZAXLOvm', // 123456
        'name' => str_random(10),
        'partner_id'=> 1,
        'last_name'=> str_random(10),
        'first_name' => str_random(10),

    ];
});
