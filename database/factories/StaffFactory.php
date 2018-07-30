<?php

use Faker\Generator as Faker;

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$MwCBUoznXI9cK9qYIh8HMeNTRTkGW26X0ZPpW5QF9ZEOrKZAXLOvm', // 123456
        'name' => str_random(10),
        'status' => 'not verfied',
        'last_name'=> str_random(10),
        'first_name' => str_random(10),
        'title' => 'operator',
        'staff_number' => '1',
        'staff_role' => '1', 
    ];
});
