<?php

use App\Models\JobSeeker;
use App\Repositories\JobSeekerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JobSeekerRepositoryTest extends TestCase
{
    use MakeJobSeekerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JobSeekerRepository
     */
    protected $jobSeekerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jobSeekerRepo = App::make(JobSeekerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJobSeeker()
    {
        $jobSeeker = $this->fakeJobSeekerData();
        $createdJobSeeker = $this->jobSeekerRepo->create($jobSeeker);
        $createdJobSeeker = $createdJobSeeker->toArray();
        $this->assertArrayHasKey('id', $createdJobSeeker);
        $this->assertNotNull($createdJobSeeker['id'], 'Created JobSeeker must have id specified');
        $this->assertNotNull(JobSeeker::find($createdJobSeeker['id']), 'JobSeeker with given id must be in DB');
        $this->assertModelData($jobSeeker, $createdJobSeeker);
    }

    /**
     * @test read
     */
    public function testReadJobSeeker()
    {
        $jobSeeker = $this->makeJobSeeker();
        $dbJobSeeker = $this->jobSeekerRepo->find($jobSeeker->id);
        $dbJobSeeker = $dbJobSeeker->toArray();
        $this->assertModelData($jobSeeker->toArray(), $dbJobSeeker);
    }

    /**
     * @test update
     */
    public function testUpdateJobSeeker()
    {
        $jobSeeker = $this->makeJobSeeker();
        $fakeJobSeeker = $this->fakeJobSeekerData();
        $updatedJobSeeker = $this->jobSeekerRepo->update($fakeJobSeeker, $jobSeeker->id);
        $this->assertModelData($fakeJobSeeker, $updatedJobSeeker->toArray());
        $dbJobSeeker = $this->jobSeekerRepo->find($jobSeeker->id);
        $this->assertModelData($fakeJobSeeker, $dbJobSeeker->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJobSeeker()
    {
        $jobSeeker = $this->makeJobSeeker();
        $resp = $this->jobSeekerRepo->delete($jobSeeker->id);
        $this->assertTrue($resp);
        $this->assertNull(JobSeeker::find($jobSeeker->id), 'JobSeeker should not exist in DB');
    }
}