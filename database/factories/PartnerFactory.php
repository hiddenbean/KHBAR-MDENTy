<?php

use Faker\Generator as Faker;

$factory->define(App\Partner::class, function (Faker $faker) {
    return [
      
        'name' => str_random(10),
        'company_name' => str_random(10),
        'about'=> str_random(100),
        'trade_registry' => str_random(10),
        'ice' => str_random(10),
        'tax_id' => str_random(10),
    ];
});
