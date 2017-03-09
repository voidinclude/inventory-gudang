<?php

use App\Models\suppliers;
use App\Repositories\suppliersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suppliersRepositoryTest extends TestCase
{
    use MakesuppliersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suppliersRepository
     */
    protected $suppliersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suppliersRepo = App::make(suppliersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuppliers()
    {
        $suppliers = $this->fakesuppliersData();
        $createdsuppliers = $this->suppliersRepo->create($suppliers);
        $createdsuppliers = $createdsuppliers->toArray();
        $this->assertArrayHasKey('id', $createdsuppliers);
        $this->assertNotNull($createdsuppliers['id'], 'Created suppliers must have id specified');
        $this->assertNotNull(suppliers::find($createdsuppliers['id']), 'suppliers with given id must be in DB');
        $this->assertModelData($suppliers, $createdsuppliers);
    }

    /**
     * @test read
     */
    public function testReadsuppliers()
    {
        $suppliers = $this->makesuppliers();
        $dbsuppliers = $this->suppliersRepo->find($suppliers->id);
        $dbsuppliers = $dbsuppliers->toArray();
        $this->assertModelData($suppliers->toArray(), $dbsuppliers);
    }

    /**
     * @test update
     */
    public function testUpdatesuppliers()
    {
        $suppliers = $this->makesuppliers();
        $fakesuppliers = $this->fakesuppliersData();
        $updatedsuppliers = $this->suppliersRepo->update($fakesuppliers, $suppliers->id);
        $this->assertModelData($fakesuppliers, $updatedsuppliers->toArray());
        $dbsuppliers = $this->suppliersRepo->find($suppliers->id);
        $this->assertModelData($fakesuppliers, $dbsuppliers->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuppliers()
    {
        $suppliers = $this->makesuppliers();
        $resp = $this->suppliersRepo->delete($suppliers->id);
        $this->assertTrue($resp);
        $this->assertNull(suppliers::find($suppliers->id), 'suppliers should not exist in DB');
    }
}
