<?php

use Faker\Factory as Faker;
use App\Models\JobSeekerReferee;
use App\Repositories\JobSeekerRefereeRepository;

trait MakeJobSeekerRefereeTrait
{
    /**
     * Create fake instance of JobSeekerReferee and save it in database
     *
     * @param array $jobSeekerRefereeFields
     * @return JobSeekerReferee
     */
    public function makeJobSeekerReferee($jobSeekerRefereeFields = [])
    {
        /** @var JobSeekerRefereeRepository $jobSeekerRefereeRepo */
        $jobSeekerRefereeRepo = App::make(JobSeekerRefereeRepository::class);
        $theme = $this->fakeJobSeekerRefereeData($jobSeekerRefereeFields);
        return $jobSeekerRefereeRepo->create($theme);
    }

    /**
     * Get fake instance of JobSeekerReferee
     *
     * @param array $jobSeekerRefereeFields
     * @return JobSeekerReferee
     */
    public function fakeJobSeekerReferee($jobSeekerRefereeFields = [])
    {
        return new JobSeekerReferee($this->fakeJobSeekerRefereeData($jobSeekerRefereeFields));
    }

    /**
     * Get fake data of JobSeekerReferee
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJobSeekerRefereeData($jobSeekerRefereeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'job_seeker_id' => $fake->randomDigitNotNull,
            'name' => $fake->name,
            'address' => $fake->city,
            'phone' => $fake->PhoneNumber,
            'confirmed' => $fake->boolean
        ], $jobSeekerRefereeFields);
    }
}
