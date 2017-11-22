<?php

use App\Models\SubscriptionPlan;
use App\Repositories\SubscriptionPlanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SubscriptionPlanRepositoryTest extends TestCase
{
    use MakeSubscriptionPlanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubscriptionPlanRepository
     */
    protected $subscriptionPlanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->subscriptionPlanRepo = App::make(SubscriptionPlanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSubscriptionPlan()
    {
        $subscriptionPlan = $this->fakeSubscriptionPlanData();
        $createdSubscriptionPlan = $this->subscriptionPlanRepo->create($subscriptionPlan);
        $createdSubscriptionPlan = $createdSubscriptionPlan->toArray();
        $this->assertArrayHasKey('id', $createdSubscriptionPlan);
        $this->assertNotNull($createdSubscriptionPlan['id'], 'Created SubscriptionPlan must have id specified');
        $this->assertNotNull(SubscriptionPlan::find($createdSubscriptionPlan['id']), 'SubscriptionPlan with given id must be in DB');
        $this->assertModelData($subscriptionPlan, $createdSubscriptionPlan);
    }

    /**
     * @test read
     */
    public function testReadSubscriptionPlan()
    {
        $subscriptionPlan = $this->makeSubscriptionPlan();
        $dbSubscriptionPlan = $this->subscriptionPlanRepo->find($subscriptionPlan->id);
        $dbSubscriptionPlan = $dbSubscriptionPlan->toArray();
        $this->assertModelData($subscriptionPlan->toArray(), $dbSubscriptionPlan);
    }

    /**
     * @test update
     */
    public function testUpdateSubscriptionPlan()
    {
        $subscriptionPlan = $this->makeSubscriptionPlan();
        $fakeSubscriptionPlan = $this->fakeSubscriptionPlanData();
        $updatedSubscriptionPlan = $this->subscriptionPlanRepo->update($fakeSubscriptionPlan, $subscriptionPlan->id);
        $this->assertModelData($fakeSubscriptionPlan, $updatedSubscriptionPlan->toArray());
        $dbSubscriptionPlan = $this->subscriptionPlanRepo->find($subscriptionPlan->id);
        $this->assertModelData($fakeSubscriptionPlan, $dbSubscriptionPlan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSubscriptionPlan()
    {
        $subscriptionPlan = $this->makeSubscriptionPlan();
        $resp = $this->subscriptionPlanRepo->delete($subscriptionPlan->id);
        $this->assertTrue($resp);
        $this->assertNull(SubscriptionPlan::find($subscriptionPlan->id), 'SubscriptionPlan should not exist in DB');
    }
}
