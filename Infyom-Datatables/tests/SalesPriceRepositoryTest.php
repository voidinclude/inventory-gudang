<?php

use App\Models\SalesPrice;
use App\Repositories\SalesPriceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SalesPriceRepositoryTest extends TestCase
{
    use MakeSalesPriceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SalesPriceRepository
     */
    protected $salesPriceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->salesPriceRepo = App::make(SalesPriceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSalesPrice()
    {
        $salesPrice = $this->fakeSalesPriceData();
        $createdSalesPrice = $this->salesPriceRepo->create($salesPrice);
        $createdSalesPrice = $createdSalesPrice->toArray();
        $this->assertArrayHasKey('id', $createdSalesPrice);
        $this->assertNotNull($createdSalesPrice['id'], 'Created SalesPrice must have id specified');
        $this->assertNotNull(SalesPrice::find($createdSalesPrice['id']), 'SalesPrice with given id must be in DB');
        $this->assertModelData($salesPrice, $createdSalesPrice);
    }

    /**
     * @test read
     */
    public function testReadSalesPrice()
    {
        $salesPrice = $this->makeSalesPrice();
        $dbSalesPrice = $this->salesPriceRepo->find($salesPrice->id);
        $dbSalesPrice = $dbSalesPrice->toArray();
        $this->assertModelData($salesPrice->toArray(), $dbSalesPrice);
    }

    /**
     * @test update
     */
    public function testUpdateSalesPrice()
    {
        $salesPrice = $this->makeSalesPrice();
        $fakeSalesPrice = $this->fakeSalesPriceData();
        $updatedSalesPrice = $this->salesPriceRepo->update($fakeSalesPrice, $salesPrice->id);
        $this->assertModelData($fakeSalesPrice, $updatedSalesPrice->toArray());
        $dbSalesPrice = $this->salesPriceRepo->find($salesPrice->id);
        $this->assertModelData($fakeSalesPrice, $dbSalesPrice->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSalesPrice()
    {
        $salesPrice = $this->makeSalesPrice();
        $resp = $this->salesPriceRepo->delete($salesPrice->id);
        $this->assertTrue($resp);
        $this->assertNull(SalesPrice::find($salesPrice->id), 'SalesPrice should not exist in DB');
    }
}
