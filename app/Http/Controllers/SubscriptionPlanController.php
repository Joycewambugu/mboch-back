<?php

namespace App\Http\Controllers;

use App\DataTables\SubscriptionPlanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubscriptionPlanRequest;
use App\Http\Requests\UpdateSubscriptionPlanRequest;
use App\Repositories\SubscriptionPlanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubscriptionPlanController extends AppBaseController
{
    /** @var  SubscriptionPlanRepository */
    private $subscriptionPlanRepository;

    public function __construct(SubscriptionPlanRepository $subscriptionPlanRepo)
    {
        $this->subscriptionPlanRepository = $subscriptionPlanRepo;
    }

    /**
     * Display a listing of the SubscriptionPlan.
     *
     * @param SubscriptionPlanDataTable $subscriptionPlanDataTable
     * @return Response
     */
    public function index(SubscriptionPlanDataTable $subscriptionPlanDataTable)
    {
        return $subscriptionPlanDataTable->render('subscription_plans.index');
    }

    /**
     * Show the form for creating a new SubscriptionPlan.
     *
     * @return Response
     */
    public function create()
    {
        return view('subscription_plans.create');
    }

    /**
     * Store a newly created SubscriptionPlan in storage.
     *
     * @param CreateSubscriptionPlanRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscriptionPlanRequest $request)
    {
        $input = $request->all();

        $subscriptionPlan = $this->subscriptionPlanRepository->create($input);

        Flash::success('Subscription Plan saved successfully.');

        return redirect(route('subscriptionPlans.index'));
    }

    /**
     * Display the specified SubscriptionPlan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subscriptionPlan = $this->subscriptionPlanRepository->findWithoutFail($id);

        if (empty($subscriptionPlan)) {
            Flash::error('Subscription Plan not found');

            return redirect(route('subscriptionPlans.index'));
        }

        return view('subscription_plans.show')->with('subscriptionPlan', $subscriptionPlan);
    }

    /**
     * Show the form for editing the specified SubscriptionPlan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subscriptionPlan = $this->subscriptionPlanRepository->findWithoutFail($id);

        if (empty($subscriptionPlan)) {
            Flash::error('Subscription Plan not found');

            return redirect(route('subscriptionPlans.index'));
        }

        return view('subscription_plans.edit')->with('subscriptionPlan', $subscriptionPlan);
    }

    /**
     * Update the specified SubscriptionPlan in storage.
     *
     * @param  int              $id
     * @param UpdateSubscriptionPlanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubscriptionPlanRequest $request)
    {
        $subscriptionPlan = $this->subscriptionPlanRepository->findWithoutFail($id);

        if (empty($subscriptionPlan)) {
            Flash::error('Subscription Plan not found');

            return redirect(route('subscriptionPlans.index'));
        }

        $subscriptionPlan = $this->subscriptionPlanRepository->update($request->all(), $id);

        Flash::success('Subscription Plan updated successfully.');

        return redirect(route('subscriptionPlans.index'));
    }

    /**
     * Remove the specified SubscriptionPlan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subscriptionPlan = $this->subscriptionPlanRepository->findWithoutFail($id);

        if (empty($subscriptionPlan)) {
            Flash::error('Subscription Plan not found');

            return redirect(route('subscriptionPlans.index'));
        }

        $this->subscriptionPlanRepository->delete($id);

        Flash::success('Subscription Plan deleted successfully.');

        return redirect(route('subscriptionPlans.index'));
    }
}
