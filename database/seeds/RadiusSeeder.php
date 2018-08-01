<?php

use Illuminate\Database\Seeder;

class RadiusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Radius', 1)->create();
    }
}
