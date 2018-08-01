<?php

use Illuminate\Database\Seeder;

class BubbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Bubble', 1)->create();
    }
}
