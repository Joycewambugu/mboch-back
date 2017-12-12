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

        return factory(App\Models\Employer::class)->make($employerFields)->toArray();
    
    }
}
