<?php

use App\Models\salesinvoices;
use App\Repositories\salesinvoicesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class salesinvoicesRepositoryTest extends TestCase
{
    use MakesalesinvoicesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var salesinvoicesRepository
     */
    protected $salesinvoicesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->salesinvoicesRepo = App::make(salesinvoicesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesalesinvoices()
    {
        $salesinvoices = $this->fakesalesinvoicesData();
        $createdsalesinvoices = $this->salesinvoicesRepo->create($salesinvoices);
        $createdsalesinvoices = $createdsalesinvoices->toArray();
        $this->assertArrayHasKey('id', $createdsalesinvoices);
        $this->assertNotNull($createdsalesinvoices['id'], 'Created salesinvoices must have id specified');
        $this->assertNotNull(salesinvoices::find($createdsalesinvoices['id']), 'salesinvoices with given id must be in DB');
        $this->assertModelData($salesinvoices, $createdsalesinvoices);
    }

    /**
     * @test read
     */
    public function testReadsalesinvoices()
    {
        $salesinvoices = $this->makesalesinvoices();
        $dbsalesinvoices = $this->salesinvoicesRepo->find($salesinvoices->id);
        $dbsalesinvoices = $dbsalesinvoices->toArray();
        $this->assertModelData($salesinvoices->toArray(), $dbsalesinvoices);
    }

    /**
     * @test update
     */
    public function testUpdatesalesinvoices()
    {
        $salesinvoices = $this->makesalesinvoices();
        $fakesalesinvoices = $this->fakesalesinvoicesData();
        $updatedsalesinvoices = $this->salesinvoicesRepo->update($fakesalesinvoices, $salesinvoices->id);
        $this->assertModelData($fakesalesinvoices, $updatedsalesinvoices->toArray());
        $dbsalesinvoices = $this->salesinvoicesRepo->find($salesinvoices->id);
        $this->assertModelData($fakesalesinvoices, $dbsalesinvoices->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesalesinvoices()
    {
        $salesinvoices = $this->makesalesinvoices();
        $resp = $this->salesinvoicesRepo->delete($salesinvoices->id);
        $this->assertTrue($resp);
        $this->assertNull(salesinvoices::find($salesinvoices->id), 'salesinvoices should not exist in DB');
    }
}
