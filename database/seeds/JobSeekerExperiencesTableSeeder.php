<?php

use Illuminate\Database\Seeder;

class JobSeekerExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\JobSeekerExperience::class, 10)->create();
    }
}
