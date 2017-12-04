<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JobSeekerExperienceApiTest extends TestCase
{
    use MakeJobSeekerExperienceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJobSeekerExperience()
    {
        $jobSeekerExperience = $this->fakeJobSeekerExperienceData();
        $this->response = $this->json('POST', '/api/v1/jobSeekerExperiences', $jobSeekerExperience);

        $this->assertApiResponse($jobSeekerExperience);
    }

    /**
     * @test
     */
    public function testReadJobSeekerExperience()
    {
        $jobSeekerExperience = $this->makeJobSeekerExperience();
        $this->response = $this->json('GET', '/api/v1/jobSeekerExperiences/'.$jobSeekerExperience->id);

        $this->assertApiResponse($jobSeekerExperience->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJobSeekerExperience()
    {
        $jobSeekerExperience = $this->makeJobSeekerExperience();
        $editedJobSeekerExperience = $this->fakeJobSeekerExperienceData();

        $this->response = $this->json('PUT', '/api/v1/jobSeekerExperiences/'.$jobSeekerExperience->id, $editedJobSeekerExperience);

        $this->assertApiResponse($editedJobSeekerExperience);
    }

    /**
     * @test
     */
    public function testDeleteJobSeekerExperience()
    {
        $jobSeekerExperience = $this->makeJobSeekerExperience();
        $this->response = $this->json('DELETE', '/api/v1/jobSeekerExperiences/'.$jobSeekerExperience->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/v1/jobSeekerExperiences/'.$jobSeekerExperience->id);

        $this->response->assertStatus(404);
    }
}