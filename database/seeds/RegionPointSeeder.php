<?php

use Illuminate\Database\Seeder;

class RegionPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\RegionPoint', 1)->create();
    }
}
