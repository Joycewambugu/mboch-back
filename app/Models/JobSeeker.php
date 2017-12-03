<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="JobSeeker",
 *      required={"name", "email", "phone"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date_of_birth",
 *          description="date_of_birth",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="gender",
 *          description="gender",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="education_level",
 *          description="education_level",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tribe",
 *          description="tribe",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="photo",
 *          description="photo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="national_id",
 *          description="national_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="experience_years",
 *          description="experience_years",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="spoken_languages",
 *          description="spoken_languages",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="religion",
 *          description="religion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="employment_status",
 *          description="employment_status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="marital_status",
 *          description="marital_status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="max_children",
 *          description="max_children",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="health_conditions",
 *          description="health_conditions",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class JobSeeker extends Model
{
    use SoftDeletes;

    public $table = 'job_seekers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'education_level',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        // 'date_of_birth' => 'date',
        'gender' => 'string',
        'education_level' => 'string',
        'tribe' => 'string',
        'photo' => 'string',
        'national_id' => 'string',
        'experience_years' => 'integer',
        'spoken_languages' => 'string',
        'religion' => 'string',
        'employment_status' => 'string',
        'marital_status' => 'string',
        'max_children' => 'integer',
        'health_conditions' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required'
    ];

    
}
