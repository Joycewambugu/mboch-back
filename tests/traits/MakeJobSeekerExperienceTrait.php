<?php

use Faker\Factory as Faker;
use App\Models\JobSeekerExperience;
use App\Repositories\JobSeekerExperienceRepository;

trait MakeJobSeekerExperienceTrait
{
    /**
     * Create fake instance of JobSeekerExperience and save it in database
     *
     * @param array $jobSeekerExperienceFields
     * @return JobSeekerExperience
     */
    public function makeJobSeekerExperience($jobSeekerExperienceFields = [])
    {
        /** @var JobSeekerExperienceRepository $jobSeekerExperienceRepo */
        $jobSeekerExperienceRepo = App::make(JobSeekerExperienceRepository::class);
        $theme = $this->fakeJobSeekerExperienceData($jobSeekerExperienceFields);
        return $jobSeekerExperienceRepo->create($theme);
    }

    /**
     * Get fake instance of JobSeekerExperience
     *
     * @param array $jobSeekerExperienceFields
     * @return JobSeekerExperience
     */
    public function fakeJobSeekerExperience($jobSeekerExperienceFields = [])
    {
        return new JobSeekerExperience($this->fakeJobSeekerExperienceData($jobSeekerExperienceFields));
    }

    /**
     * Get fake data of JobSeekerExperience
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJobSeekerExperienceData($jobSeekerExperienceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'job_seeker_id' => $fake->randomDigitNotNull,
            'start_date' => $fake->date,
            'end_date' => $fake->date,
            'location' => $fake->word,
            'family_type' => $fake->word,
            'no_of_children' => $fake->randomDigitNotNull,
            'employer_name' => $fake->word,
            'employer_contact' => $fake->word,
            'description' => $fake->text,
            // 'created_at' => $fake->word,
            // 'updated_at' => $fake->word
        ], $jobSeekerExperienceFields);
    }
}
