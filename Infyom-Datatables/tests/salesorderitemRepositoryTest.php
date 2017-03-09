<?php

use App\Models\salesorderitem;
use App\Repositories\salesorderitemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class salesorderitemRepositoryTest extends TestCase
{
    use MakesalesorderitemTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var salesorderitemRepository
     */
    protected $salesorderitemRepo;

    public function setUp()
    {
        parent::setUp();
        $this->salesorderitemRepo = App::make(salesorderitemRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesalesorderitem()
    {
        $salesorderitem = $this->fakesalesorderitemData();
        $createdsalesorderitem = $this->salesorderitemRepo->create($salesorderitem);
        $createdsalesorderitem = $createdsalesorderitem->toArray();
        $this->assertArrayHasKey('id', $createdsalesorderitem);
        $this->assertNotNull($createdsalesorderitem['id'], 'Created salesorderitem must have id specified');
        $this->assertNotNull(salesorderitem::find($createdsalesorderitem['id']), 'salesorderitem with given id must be in DB');
        $this->assertModelData($salesorderitem, $createdsalesorderitem);
    }

    /**
     * @test read
     */
    public function testReadsalesorderitem()
    {
        $salesorderitem = $this->makesalesorderitem();
        $dbsalesorderitem = $this->salesorderitemRepo->find($salesorderitem->id);
        $dbsalesorderitem = $dbsalesorderitem->toArray();
        $this->assertModelData($salesorderitem->toArray(), $dbsalesorderitem);
    }

    /**
     * @test update
     */
    public function testUpdatesalesorderitem()
    {
        $salesorderitem = $this->makesalesorderitem();
        $fakesalesorderitem = $this->fakesalesorderitemData();
        $updatedsalesorderitem = $this->salesorderitemRepo->update($fakesalesorderitem, $salesorderitem->id);
        $this->assertModelData($fakesalesorderitem, $updatedsalesorderitem->toArray());
        $dbsalesorderitem = $this->salesorderitemRepo->find($salesorderitem->id);
        $this->assertModelData($fakesalesorderitem, $dbsalesorderitem->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesalesorderitem()
    {
        $salesorderitem = $this->makesalesorderitem();
        $resp = $this->salesorderitemRepo->delete($salesorderitem->id);
        $this->assertTrue($resp);
        $this->assertNull(salesorderitem::find($salesorderitem->id), 'salesorderitem should not exist in DB');
    }
}
