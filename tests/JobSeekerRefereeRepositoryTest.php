<?php

use App\Models\JobSeekerReferee;
use App\Repositories\JobSeekerRefereeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JobSeekerRefereeRepositoryTest extends TestCase
{
    use MakeJobSeekerRefereeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JobSeekerRefereeRepository
     */
    protected $jobSeekerRefereeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jobSeekerRefereeRepo = App::make(JobSeekerRefereeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJobSeekerReferee()
    {
        $jobSeekerReferee = $this->fakeJobSeekerRefereeData();
        $createdJobSeekerReferee = $this->jobSeekerRefereeRepo->create($jobSeekerReferee);
        $createdJobSeekerReferee = $createdJobSeekerReferee->toArray();
        $this->assertArrayHasKey('id', $createdJobSeekerReferee);
        $this->assertNotNull($createdJobSeekerReferee['id'], 'Created JobSeekerReferee must have id specified');
        $this->assertNotNull(JobSeekerReferee::find($createdJobSeekerReferee['id']), 'JobSeekerReferee with given id must be in DB');
        $this->assertModelData($jobSeekerReferee, $createdJobSeekerReferee);
    }

    /**
     * @test read
     */
    public function testReadJobSeekerReferee()
    {
        $jobSeekerReferee = $this->makeJobSeekerReferee();
        $dbJobSeekerReferee = $this->jobSeekerRefereeRepo->find($jobSeekerReferee->id);
        $dbJobSeekerReferee = $dbJobSeekerReferee->toArray();
        $this->assertModelData($jobSeekerReferee->toArray(), $dbJobSeekerReferee);
    }

    /**
     * @test update
     */
    public function testUpdateJobSeekerReferee()
    {
        $jobSeekerReferee = $this->makeJobSeekerReferee();
        $fakeJobSeekerReferee = $this->fakeJobSeekerRefereeData();
        $updatedJobSeekerReferee = $this->jobSeekerRefereeRepo->update($fakeJobSeekerReferee, $jobSeekerReferee->id);
        $this->assertModelData($fakeJobSeekerReferee, $updatedJobSeekerReferee->toArray());
        $dbJobSeekerReferee = $this->jobSeekerRefereeRepo->find($jobSeekerReferee->id);
        $this->assertModelData($fakeJobSeekerReferee, $dbJobSeekerReferee->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJobSeekerReferee()
    {
        $jobSeekerReferee = $this->makeJobSeekerReferee();
        $resp = $this->jobSeekerRefereeRepo->delete($jobSeekerReferee->id);
        $this->assertTrue($resp);
        $this->assertNull(JobSeekerReferee::find($jobSeekerReferee->id), 'JobSeekerReferee should not exist in DB');
    }
}