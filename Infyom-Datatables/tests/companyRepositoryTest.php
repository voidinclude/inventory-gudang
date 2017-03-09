<?php

use App\Models\company;
use App\Repositories\companyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class companyRepositoryTest extends TestCase
{
    use MakecompanyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var companyRepository
     */
    protected $companyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->companyRepo = App::make(companyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecompany()
    {
        $company = $this->fakecompanyData();
        $createdcompany = $this->companyRepo->create($company);
        $createdcompany = $createdcompany->toArray();
        $this->assertArrayHasKey('id', $createdcompany);
        $this->assertNotNull($createdcompany['id'], 'Created company must have id specified');
        $this->assertNotNull(company::find($createdcompany['id']), 'company with given id must be in DB');
        $this->assertModelData($company, $createdcompany);
    }

    /**
     * @test read
     */
    public function testReadcompany()
    {
        $company = $this->makecompany();
        $dbcompany = $this->companyRepo->find($company->id);
        $dbcompany = $dbcompany->toArray();
        $this->assertModelData($company->toArray(), $dbcompany);
    }

    /**
     * @test update
     */
    public function testUpdatecompany()
    {
        $company = $this->makecompany();
        $fakecompany = $this->fakecompanyData();
        $updatedcompany = $this->companyRepo->update($fakecompany, $company->id);
        $this->assertModelData($fakecompany, $updatedcompany->toArray());
        $dbcompany = $this->companyRepo->find($company->id);
        $this->assertModelData($fakecompany, $dbcompany->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecompany()
    {
        $company = $this->makecompany();
        $resp = $this->companyRepo->delete($company->id);
        $this->assertTrue($resp);
        $this->assertNull(company::find($company->id), 'company should not exist in DB');
    }
}
