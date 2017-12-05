<?php

namespace App\Repositories;

use App\Models\JobSeekerReferee;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JobSeekerRefereeRepository
 * @package App\Repositories
 * @version December 5, 2017, 10:03 am UTC
 *
 * @method JobSeekerReferee findWithoutFail($id, $columns = ['*'])
 * @method JobSeekerReferee find($id, $columns = ['*'])
 * @method JobSeekerReferee first($columns = ['*'])
*/
class JobSeekerRefereeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'job_seeker_id',
        'name',
        'address',
        'phone',
        'confirmed'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JobSeekerReferee::class;
    }
}
