<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * @SWG\Definition(
 *      definition="Employer",
 *      required={"user_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="photo",
 *          description="photo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="current_location",
 *          description="current_location",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tribe",
 *          description="tribe",
 *          type="string"
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
 *          property="family_structure",
 *          description="family_structure",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="house_size",
 *          description="house_size",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_of_children",
 *          description="no_of_children",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="help_hours",
 *          description="help_hours",
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
class Employer extends Model
{
    use SoftDeletes;

    public $table = 'employers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'photo',
        // 'name',
        // 'email',
        // 'phone',        
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id'=> 'integer',
        'photo' => 'string',
        'current_location' => 'string',
        'tribe' => 'string',
        'spoken_languages' => 'string',
        'religion' => 'string',
        'family_structure' => 'string',
        'house_size' => 'string',
        'no_of_children' => 'integer',
        'help_hours' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    
}
