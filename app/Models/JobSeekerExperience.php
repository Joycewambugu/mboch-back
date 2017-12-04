<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * @SWG\Definition(
 *      definition="JobSeekerExperience",
 *      required={"job_seeker_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="job_seeker_id",
 *          description="job_seeker_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="start_date",
 *          description="start_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="end_date",
 *          description="end_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="location",
 *          description="location",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="family_type",
 *          description="family_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_of_children",
 *          description="no_of_children",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="employer_name",
 *          description="employer_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="employer_contact",
 *          description="employer_contact",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
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
class JobSeekerExperience extends Model
{
    use SoftDeletes;

    public $table = 'job_seeker_experiences';
    

    protected $dates = ['deleted_at','start_date','end_date'];

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'job_seeker_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'location' => 'string',
        'family_type' => 'string',
        'no_of_children' => 'integer',
        'employer_name' => 'string',
        'employer_contact' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'job_seeker_id' => 'required'
    ];

    public function JobSeeker()
    {
        return $this->belongsTo(\App\Models\Jobseeker::class,'job_seeker_id');
    }

    public function getStartDateAttribute( $value ) {
        return Carbon::parse($value)->format('Y-m-d');
      }
    public function getEndDateAttribute( $value ) {
        return Carbon::parse($value)->format('Y-m-d');
      }

    
}
