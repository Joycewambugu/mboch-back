<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubscriptionPlanAPIRequest;
use App\Http\Requests\API\UpdateSubscriptionPlanAPIRequest;
use App\Models\SubscriptionPlan;
use App\Repositories\SubscriptionPlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SubscriptionPlanController
 * @package App\Http\Controllers\API
 */

class SubscriptionPlanAPIController extends AppBaseController
{
    /** @var  SubscriptionPlanRepository */
    private $subscriptionPlanRepository;

    public function __construct(SubscriptionPlanRepository $subscriptionPlanRepo)
    {
        $this->subscriptionPlanRepository = $subscriptionPlanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/subscriptionPlans",
     *      summary="Get a listing of the SubscriptionPlans.",
     *      tags={"SubscriptionPlan"},
     *      description="Get all SubscriptionPlans",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/SubscriptionPlan")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->subscriptionPlanRepository->pushCriteria(new RequestCriteria($request));
        $this->subscriptionPlanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $subscriptionPlans = $this->subscriptionPlanRepository->all();

        return $this->sendResponse($subscriptionPlans->toArray(), 'Subscription Plans retrieved successfully');
    }

    /**
     * @param CreateSubscriptionPlanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/subscriptionPlans",
     *      summary="Store a newly created SubscriptionPlan in storage",
     *      tags={"SubscriptionPlan"},
     *      description="Store SubscriptionPlan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubscriptionPlan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubscriptionPlan")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/SubscriptionPlan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSubscriptionPlanAPIRequest $request)
    {
        $input = $request->all();

        $subscriptionPlans = $this->subscriptionPlanRepository->create($input);

        return $this->sendResponse($subscriptionPlans->toArray(), 'Subscription Plan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/subscriptionPlans/{id}",
     *      summary="Display the specified SubscriptionPlan",
     *      tags={"SubscriptionPlan"},
     *      description="Get SubscriptionPlan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubscriptionPlan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/SubscriptionPlan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var SubscriptionPlan $subscriptionPlan */
        $subscriptionPlan = $this->subscriptionPlanRepository->findWithoutFail($id);

        if (empty($subscriptionPlan)) {
            return $this->sendError('Subscription Plan not found');
        }

        return $this->sendResponse($subscriptionPlan->toArray(), 'Subscription Plan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSubscriptionPlanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/subscriptionPlans/{id}",
     *      summary="Update the specified SubscriptionPlan in storage",
     *      tags={"SubscriptionPlan"},
     *      description="Update SubscriptionPlan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubscriptionPlan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubscriptionPlan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubscriptionPlan")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/SubscriptionPlan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSubscriptionPlanAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubscriptionPlan $subscriptionPlan */
        $subscriptionPlan = $this->subscriptionPlanRepository->findWithoutFail($id);

        if (empty($subscriptionPlan)) {
            return $this->sendError('Subscription Plan not found');
        }

        $subscriptionPlan = $this->subscriptionPlanRepository->update($input, $id);

        return $this->sendResponse($subscriptionPlan->toArray(), 'SubscriptionPlan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/subscriptionPlans/{id}",
     *      summary="Remove the specified SubscriptionPlan from storage",
     *      tags={"SubscriptionPlan"},
     *      description="Delete SubscriptionPlan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubscriptionPlan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var SubscriptionPlan $subscriptionPlan */
        $subscriptionPlan = $this->subscriptionPlanRepository->findWithoutFail($id);

        if (empty($subscriptionPlan)) {
            return $this->sendError('Subscription Plan not found');
        }

        $subscriptionPlan->delete();

        return $this->sendResponse($id, 'Subscription Plan deleted successfully');
    }
}
