<?php

use Illuminate\Database\Seeder;

class JobSeekerRefereesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\JobSeekerReferee::class, 10)->create();
    }
}
