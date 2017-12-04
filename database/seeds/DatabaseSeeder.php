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
         $this->call(SubscriptionPansTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(JobSeekersTableSeeder::class);
         $this->call(EmployersTableSeeder::class);
        
    }
}
