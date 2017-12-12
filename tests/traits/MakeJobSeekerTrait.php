<?php

use Faker\Factory as Faker;
use App\Models\JobSeeker;
use App\Repositories\JobSeekerRepository;

trait MakeJobSeekerTrait
{
    /**
     * Create fake instance of JobSeeker and save it in database
     *
     * @param array $jobSeekerFields
     * @return JobSeeker
     */
    public function makeJobSeeker($jobSeekerFields = [])
    {
        /** @var JobSeekerRepository $jobSeekerRepo */
        $jobSeekerRepo = App::make(JobSeekerRepository::class);
        $theme = $this->fakeJobSeekerData($jobSeekerFields);
        return $jobSeekerRepo->create($theme);
    }

    /**
     * Get fake instance of JobSeeker
     *
     * @param array $jobSeekerFields
     * @return JobSeeker
     */
    public function fakeJobSeeker($jobSeekerFields = [])
    {
        return new JobSeeker($this->fakeJobSeekerData($jobSeekerFields));
    }

    /**
     * Get fake data of JobSeeker
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJobSeekerData($jobSeekerFields = [])
    {
        return factory(App\Models\JobSeeker::class)->make($jobSeekerFields)->toArray();
    }
}
