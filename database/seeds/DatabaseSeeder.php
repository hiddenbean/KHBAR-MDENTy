<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             RegionSeeder::class,
             AdressSeeder::class,
             CountryCodeSeeder::class,
             PartnerAccountSeeder::class,
             PartnerSeeder::class,
             StaffSeeder::class,
             RegionPointSeeder::class,
             SubjectSeeder::class,
             StatusSeeder::class,
             TopicSeeder::class,
             PhoneSeeder::class,
             ReasonSeeder::class,
              KhbarSeeder::class,
             CoordinateSeeder::class,
             BubbleSeeder::class,
             RadiusSeeder::class,
         ]);
    }
}
