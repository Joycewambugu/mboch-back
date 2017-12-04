<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EmployerApiTest extends TestCase
{
    use MakeEmployerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEmployer()
    {
        $employer = $this->fakeEmployerData();
        $this->response = $this->json('POST', '/api/v1/employers', $employer);

        $this->assertApiResponse($employer);
    }

    /**
     * @test
     */
    public function testReadEmployer()
    {
        $employer = $this->makeEmployer();
        $this->response = $this->json('GET', '/api/v1/employers/'.$employer->id);

        $this->assertApiResponse($employer->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEmployer()
    {
        $employer = $this->makeEmployer();
        $editedEmployer = $this->fakeEmployerData();

        $this->response = $this->json('PUT', '/api/v1/employers/'.$employer->id, $editedEmployer);

        $this->assertApiResponse($editedEmployer);
    }

    /**
     * @test
     */
    public function testDeleteEmployer()
    {
        $employer = $this->makeEmployer();
        $this->response = $this->json('DELETE', '/api/v1/employers/'.$employer->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/v1/employers/'.$employer->id);

        $this->response->assertStatus(404);
    }
}