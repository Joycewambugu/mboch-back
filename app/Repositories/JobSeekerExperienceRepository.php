<?php

namespace App\Repositories;

use App\Models\JobSeekerExperience;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JobSeekerExperienceRepository
 * @package App\Repositories
 * @version December 4, 2017, 9:54 pm UTC
 *
 * @method JobSeekerExperience findWithoutFail($id, $columns = ['*'])
 * @method JobSeekerExperience find($id, $columns = ['*'])
 * @method JobSeekerExperience first($columns = ['*'])
*/
class JobSeekerExperienceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'job_seeker_id',
        'start_date',
        'end_date',
        'location',
        'family_type',
        'no_of_children',
        'employer_name',
        'employer_contact',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JobSeekerExperience::class;
    }
}
