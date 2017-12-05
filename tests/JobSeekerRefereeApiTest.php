<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JobSeekerRefereeApiTest extends TestCase
{
    use MakeJobSeekerRefereeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJobSeekerReferee()
    {
        $jobSeekerReferee = $this->fakeJobSeekerRefereeData();
        $this->response = $this->json('POST', '/api/v1/jobSeekerReferees', $jobSeekerReferee);

        $this->assertApiResponse($jobSeekerReferee);
    }

    /**
     * @test
     */
    public function testReadJobSeekerReferee()
    {
        $jobSeekerReferee = $this->makeJobSeekerReferee();
        $this->response = $this->json('GET', '/api/v1/jobSeekerReferees/'.$jobSeekerReferee->id);

        $this->assertApiResponse($jobSeekerReferee->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJobSeekerReferee()
    {
        $jobSeekerReferee = $this->makeJobSeekerReferee();
        $editedJobSeekerReferee = $this->fakeJobSeekerRefereeData();

        $this->response = $this->json('PUT', '/api/v1/jobSeekerReferees/'.$jobSeekerReferee->id, $editedJobSeekerReferee);

        $this->assertApiResponse($editedJobSeekerReferee);
    }

    /**
     * @test
     */
    public function testDeleteJobSeekerReferee()
    {
        $jobSeekerReferee = $this->makeJobSeekerReferee();
        $this->response = $this->json('DELETE', '/api/v1/jobSeekerReferees/'.$jobSeekerReferee->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/v1/jobSeekerReferees/'.$jobSeekerReferee->id);

        $this->response->assertStatus(404);
    }
}