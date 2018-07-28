<?php

use Faker\Generator as Faker;

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$zjTYMJVY26YxiFxpINVmnu2/r0VphPn/iojSIno0Z8VBwYDrT4yda', // secret
        'name' => str_random(10),
        'status' => 'not verfied',
        'last_name'=> str_random(10),
        'first_name' => str_random(10),
        'title' => 'operator',
        'staff_number' => '1',
        'staff_role' => '1', 
    ];
});
