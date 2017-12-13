<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SubscriptionPansTableSeeder::class,
            UsersTableSeeder::class,
            JobSeekersTableSeeder::class,
            // JobSeekerExperiencesTableSeeder::class,
            // JobSeekerRefereesTableSeeder::class,
            EmployersTableSeeder::class
        ]);
        
    }
}
