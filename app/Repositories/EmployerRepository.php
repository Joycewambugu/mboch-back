<?php

namespace App\Repositories;

use App\Models\Employer;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmployerRepository
 * @package App\Repositories
 * @version January 12, 2018, 10:33 am UTC
 *
 * @method Employer findWithoutFail($id, $columns = ['*'])
 * @method Employer find($id, $columns = ['*'])
 * @method Employer first($columns = ['*'])
*/
class EmployerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'photo',
        'current_location',
        'tribe',
        'spoken_languages',
        'religion',
        'family_structure',
        'house_size',
        'no_of_children',
        'help_hours'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employer::class;
    }
}
