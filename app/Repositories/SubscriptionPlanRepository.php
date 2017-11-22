<?php

namespace App\Repositories;

use App\Models\SubscriptionPlan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubscriptionPlanRepository
 * @package App\Repositories
 * @version November 22, 2017, 5:17 am UTC
 *
 * @method SubscriptionPlan findWithoutFail($id, $columns = ['*'])
 * @method SubscriptionPlan find($id, $columns = ['*'])
 * @method SubscriptionPlan first($columns = ['*'])
*/
class SubscriptionPlanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'price',
        'search_limit'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubscriptionPlan::class;
    }
}
