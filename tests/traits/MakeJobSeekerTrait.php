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
        $fake = Faker::create();
        return array_merge([
            'name' => $fake->word,
            'email' => $fake->word,
            'phone' => $fake->word,
            'date_of_birth' => $fake->date,
            'gender' => $fake->word,
            'education_level' => $fake->word,
            'tribe' => $fake->word,
            'photo' => $fake->word,
            'national_id' => $fake->word,
            'experience_years' => $fake->randomDigitNotNull,
            'spoken_languages' => $fake->word,
            'religion' => $fake->word,
            'employment_status' => $fake->word,
            'marital_status' => $fake->word,
            'max_children' => $fake->randomDigitNotNull,
            'health_conditions' => $fake->text,
            // 'created_at' => $fake->word,
            // 'updated_at' => $fake->word
        ], $jobSeekerFields);
    }
}
