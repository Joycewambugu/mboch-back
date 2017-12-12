<?php

namespace App\Repositories;

use App\Models\JobSeeker;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JobSeekerRepository
 * @package App\Repositories
 * @version December 2, 2017, 1:45 pm UTC
 *
 * @method JobSeeker findWithoutFail($id, $columns = ['*'])
 * @method JobSeeker find($id, $columns = ['*'])
 * @method JobSeeker first($columns = ['*'])
*/
class JobSeekerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'education_level',
        'current_location',
        'tribe',
        'photo',
        'national_id',
        'experience_years',
        'spoken_languages',
        'religion',
        'employment_status',
        'marital_status',
        'max_children',
        'health_conditions'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JobSeeker::class;
    }
}
