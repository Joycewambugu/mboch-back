<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionPlanApiTest extends TestCase
{
    use MakeSubscriptionPlanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSubscriptionPlan()
    {
        $subscriptionPlan = $this->fakeSubscriptionPlanData();
        $this->json('POST', '/api/v1/subscriptionPlans', $subscriptionPlan);

        $this->assertApiResponse($subscriptionPlan);
    }

    /**
     * @test
     */
    public function testReadSubscriptionPlan()
    {
        $subscriptionPlan = $this->makeSubscriptionPlan();
        $this->json('GET', '/api/v1/subscriptionPlans/'.$subscriptionPlan->id);

        $this->assertApiResponse($subscriptionPlan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSubscriptionPlan()
    {
        $subscriptionPlan = $this->makeSubscriptionPlan();
        $editedSubscriptionPlan = $this->fakeSubscriptionPlanData();

        $this->json('PUT', '/api/v1/subscriptionPlans/'.$subscriptionPlan->id, $editedSubscriptionPlan);

        $this->assertApiResponse($editedSubscriptionPlan);
    }

    /**
     * @test
     */
    public function testDeleteSubscriptionPlan()
    {
        $subscriptionPlan = $this->makeSubscriptionPlan();
        $this->json('DELETE', '/api/v1/subscriptionPlans/'.$subscriptionPlan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/subscriptionPlans/'.$subscriptionPlan->id);

        $this->assertResponseStatus(404);
    }
}
