<?php

use App\Models\customers;
use App\Repositories\customersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class customersRepositoryTest extends TestCase
{
    use MakecustomersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var customersRepository
     */
    protected $customersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->customersRepo = App::make(customersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecustomers()
    {
        $customers = $this->fakecustomersData();
        $createdcustomers = $this->customersRepo->create($customers);
        $createdcustomers = $createdcustomers->toArray();
        $this->assertArrayHasKey('id', $createdcustomers);
        $this->assertNotNull($createdcustomers['id'], 'Created customers must have id specified');
        $this->assertNotNull(customers::find($createdcustomers['id']), 'customers with given id must be in DB');
        $this->assertModelData($customers, $createdcustomers);
    }

    /**
     * @test read
     */
    public function testReadcustomers()
    {
        $customers = $this->makecustomers();
        $dbcustomers = $this->customersRepo->find($customers->id);
        $dbcustomers = $dbcustomers->toArray();
        $this->assertModelData($customers->toArray(), $dbcustomers);
    }

    /**
     * @test update
     */
    public function testUpdatecustomers()
    {
        $customers = $this->makecustomers();
        $fakecustomers = $this->fakecustomersData();
        $updatedcustomers = $this->customersRepo->update($fakecustomers, $customers->id);
        $this->assertModelData($fakecustomers, $updatedcustomers->toArray());
        $dbcustomers = $this->customersRepo->find($customers->id);
        $this->assertModelData($fakecustomers, $dbcustomers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecustomers()
    {
        $customers = $this->makecustomers();
        $resp = $this->customersRepo->delete($customers->id);
        $this->assertTrue($resp);
        $this->assertNull(customers::find($customers->id), 'customers should not exist in DB');
    }
}
