<?php

use Illuminate\Database\Seeder;

class PartnerAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\PartnerAccount', 1)->create();
    }
}
