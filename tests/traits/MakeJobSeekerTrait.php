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
        $faker = Faker::create();
        return array_merge([
            'name' => $faker->name,
            'email' => $faker->unique()->email,
            'phone' => $faker->unique()->PhoneNumber,
            'date_of_birth' => $faker->date,
            'gender' => $faker->randomElement($array = array ('male', 'female')),
            'education_level' =>  $faker->randomElement($array = array ('primary', 'secondary','college','university')),
            'current_location' =>  $faker->city,
            'tribe' =>  $faker->randomElement($array = array ('Dahalo','Digo','Duruma','Edo','El Molo','Embu','Garreh-Ajuran','Giryama','Kalenjin','Kamba','Kikuyu','Kisii','Kuria','Luhya','Luo','Masai','Meru','Mijikenda','Ogiek','Rendille','Samburu','Somali','Swahili','Taita','Teso','Tharaka','Turkana','Yaaku')),
            'photo' => $faker->imageUrl($width = 640, $height = 480),
            'national_id' => $faker->randomNumber(8),
            'experience_years' => $faker->randomDigitNotNull,
            'spoken_languages' => $faker->word,
            'religion' => $faker->word,
            'employment_status' =>  $faker->randomElement($array = array ('employed', 'searching','suspended')),
            'marital_status' => $faker->randomElement($array = array ('single', 'married','divorced','widowed')),
            'max_children' => $faker->randomDigitNotNull,
            'health_conditions' => $faker->text,
        ], $jobSeekerFields);
    }
}
