<?php

use App\Models\Employer;
use App\Repositories\EmployerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EmployerRepositoryTest extends TestCase
{
    use MakeEmployerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EmployerRepository
     */
    protected $employerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->employerRepo = App::make(EmployerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEmployer()
    {
        $employer = $this->fakeEmployerData();
        $createdEmployer = $this->employerRepo->create($employer);
        $createdEmployer = $createdEmployer->toArray();
        $this->assertArrayHasKey('id', $createdEmployer);
        $this->assertNotNull($createdEmployer['id'], 'Created Employer must have id specified');
        $this->assertNotNull(Employer::find($createdEmployer['id']), 'Employer with given id must be in DB');
        $this->assertModelData($employer, $createdEmployer);
    }

    /**
     * @test read
     */
    public function testReadEmployer()
    {
        $employer = $this->makeEmployer();
        $dbEmployer = $this->employerRepo->find($employer->id);
        $dbEmployer = $dbEmployer->toArray();
        $this->assertModelData($employer->toArray(), $dbEmployer);
    }

    /**
     * @test update
     */
    public function testUpdateEmployer()
    {
        $employer = $this->makeEmployer();
        $fakeEmployer = $this->fakeEmployerData();
        $updatedEmployer = $this->employerRepo->update($fakeEmployer, $employer->id);
        $this->assertModelData($fakeEmployer, $updatedEmployer->toArray());
        $dbEmployer = $this->employerRepo->find($employer->id);
        $this->assertModelData($fakeEmployer, $dbEmployer->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEmployer()
    {
        $employer = $this->makeEmployer();
        $resp = $this->employerRepo->delete($employer->id);
        $this->assertTrue($resp);
        $this->assertNull(Employer::find($employer->id), 'Employer should not exist in DB');
    }
}