<?php

use App\Models\JobSeekerExperience;
use App\Repositories\JobSeekerExperienceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JobSeekerExperienceRepositoryTest extends TestCase
{
    use MakeJobSeekerExperienceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JobSeekerExperienceRepository
     */
    protected $jobSeekerExperienceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jobSeekerExperienceRepo = App::make(JobSeekerExperienceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJobSeekerExperience()
    {
        $jobSeekerExperience = $this->fakeJobSeekerExperienceData();
        $createdJobSeekerExperience = $this->jobSeekerExperienceRepo->create($jobSeekerExperience);
        $createdJobSeekerExperience = $createdJobSeekerExperience->toArray();
        $this->assertArrayHasKey('id', $createdJobSeekerExperience);
        $this->assertNotNull($createdJobSeekerExperience['id'], 'Created JobSeekerExperience must have id specified');
        $this->assertNotNull(JobSeekerExperience::find($createdJobSeekerExperience['id']), 'JobSeekerExperience with given id must be in DB');
        $this->assertModelData($jobSeekerExperience, $createdJobSeekerExperience);
    }

    /**
     * @test read
     */
    public function testReadJobSeekerExperience()
    {
        $jobSeekerExperience = $this->makeJobSeekerExperience();
        $dbJobSeekerExperience = $this->jobSeekerExperienceRepo->find($jobSeekerExperience->id);
        $dbJobSeekerExperience = $dbJobSeekerExperience->toArray();
        $this->assertModelData($jobSeekerExperience->toArray(), $dbJobSeekerExperience);
    }

    /**
     * @test update
     */
    public function testUpdateJobSeekerExperience()
    {
        $jobSeekerExperience = $this->makeJobSeekerExperience();
        $fakeJobSeekerExperience = $this->fakeJobSeekerExperienceData();
        $updatedJobSeekerExperience = $this->jobSeekerExperienceRepo->update($fakeJobSeekerExperience, $jobSeekerExperience->id);
        $this->assertModelData($fakeJobSeekerExperience, $updatedJobSeekerExperience->toArray());
        $dbJobSeekerExperience = $this->jobSeekerExperienceRepo->find($jobSeekerExperience->id);
        $this->assertModelData($fakeJobSeekerExperience, $dbJobSeekerExperience->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJobSeekerExperience()
    {
        $jobSeekerExperience = $this->makeJobSeekerExperience();
        $resp = $this->jobSeekerExperienceRepo->delete($jobSeekerExperience->id);
        $this->assertTrue($resp);
        $this->assertNull(JobSeekerExperience::find($jobSeekerExperience->id), 'JobSeekerExperience should not exist in DB');
    }
}