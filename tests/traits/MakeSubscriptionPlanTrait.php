<?php

use Faker\Factory as Faker;
use App\Models\SubscriptionPlan;
use App\Repositories\SubscriptionPlanRepository;

trait MakeSubscriptionPlanTrait
{
    /**
     * Create fake instance of SubscriptionPlan and save it in database
     *
     * @param array $subscriptionPlanFields
     * @return SubscriptionPlan
     */
    public function makeSubscriptionPlan($subscriptionPlanFields = [])
    {
        /** @var SubscriptionPlanRepository $subscriptionPlanRepo */
        $subscriptionPlanRepo = App::make(SubscriptionPlanRepository::class);
        $theme = $this->fakeSubscriptionPlanData($subscriptionPlanFields);
        return $subscriptionPlanRepo->create($theme);
    }

    /**
     * Get fake instance of SubscriptionPlan
     *
     * @param array $subscriptionPlanFields
     * @return SubscriptionPlan
     */
    public function fakeSubscriptionPlan($subscriptionPlanFields = [])
    {
        return new SubscriptionPlan($this->fakeSubscriptionPlanData($subscriptionPlanFields));
    }

    /**
     * Get fake data of SubscriptionPlan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSubscriptionPlanData($subscriptionPlanFields = [])
    {
        return factory(App\Models\SubscriptionPlan::class)->make($subscriptionPlanFields)->toArray();
    }
}
