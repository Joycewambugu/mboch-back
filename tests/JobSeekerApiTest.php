<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JobSeekerApiTest extends TestCase
{
    use MakeJobSeekerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJobSeeker()
    {
        $jobSeeker = $this->fakeJobSeekerData();
        $this->response = $this->json('POST', '/api/v1/jobSeekers', $jobSeeker);

        $this->assertApiResponse($jobSeeker);
    }

    /**
     * @test
     */
    public function testReadJobSeeker()
    {
        $jobSeeker = $this->makeJobSeeker();
        $this->response = $this->json('GET', '/api/v1/jobSeekers/'.$jobSeeker->id);

        $this->assertApiResponse($jobSeeker->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJobSeeker()
    {
        $jobSeeker = $this->makeJobSeeker();
        $editedJobSeeker = $this->fakeJobSeekerData();

        $this->response = $this->json('PUT', '/api/v1/jobSeekers/'.$jobSeeker->id, $editedJobSeeker);

        $this->assertApiResponse($editedJobSeeker);
    }

    /**
     * @test
     */
    public function testDeleteJobSeeker()
    {
        $jobSeeker = $this->makeJobSeeker();
        $this->response = $this->json('DELETE', '/api/v1/jobSeekers/'.$jobSeeker->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/v1/jobSeekers/'.$jobSeeker->id);

        $this->response->assertStatus(404);
    }
}