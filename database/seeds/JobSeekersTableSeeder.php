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
        factory(\App\Models\JobSeeker::class, 10)->create()
        ->each(function ($jobSeeker) {
            factory(App\Models\JobSeekerReferee::class,3)
            ->create(['job_seeker_id' => $jobSeeker->id]);
            factory(App\Models\JobSeekerExperience::class,random_int(1,5))
            ->create(['job_seeker_id' => $jobSeeker->id]);
        });
    }
}
