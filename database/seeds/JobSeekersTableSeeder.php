<?php

use Illuminate\Database\Seeder;

class JobSeekersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\JobSeeker::class, 10)->create();
    }
}
