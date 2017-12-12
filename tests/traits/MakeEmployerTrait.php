<?php

use Faker\Factory as Faker;
use App\Models\Employer;
use App\Repositories\EmployerRepository;

trait MakeEmployerTrait
{
    /**
     * Create fake instance of Employer and save it in database
     *
     * @param array $employerFields
     * @return Employer
     */
    public function makeEmployer($employerFields = [])
    {
        /** @var EmployerRepository $employerRepo */
        $employerRepo = App::make(EmployerRepository::class);
        $theme = $this->fakeEmployerData($employerFields);
        return $employerRepo->create($theme);
    }

    /**
     * Get fake instance of Employer
     *
     * @param array $employerFields
     * @return Employer
     */
    public function fakeEmployer($employerFields = [])
    {
        return new Employer($this->fakeEmployerData($employerFields));
    }

    /**
     * Get fake data of Employer
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEmployerData($employerFields = [])
    {
        $faker = Faker::create();

        return array_merge([
            'user_id'=> function(){ 
                return factory(\App\User::class)->create()->id; 
            },
            'name' => $faker->name,
            'photo' => $faker->imageUrl($width = 640, $height = 480),
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'current_location' => $faker->city,
            'tribe' => $faker->randomElement($array = array ('Dahalo','Digo','Duruma','Edo','El Molo','Embu','Garreh-Ajuran','Giryama','Kalenjin','Kamba','Kikuyu','Kisii','Kuria','Luhya','Luo','Masai','Meru','Mijikenda','Ogiek','Rendille','Samburu','Somali','Swahili','Taita','Teso','Tharaka','Turkana','Yaaku')),
            'spoken_languages' => $faker->word,
            'religion' => $faker->word,
            'family_structure' => $faker->word,
            'house_size' => $faker->word,
            'no_of_children' => $faker->randomDigitNotNull,
            'help_hours' => $faker->word,
        ], $employerFields);
    }
}
