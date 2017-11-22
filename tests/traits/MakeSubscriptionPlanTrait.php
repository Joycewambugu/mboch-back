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
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'price' => $fake->randomDigitNotNull,
            'search_limit' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $subscriptionPlanFields);
    }
}
