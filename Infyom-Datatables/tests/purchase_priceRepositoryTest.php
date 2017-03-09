<?php

use App\Models\purchase_price;
use App\Repositories\purchase_priceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class purchase_priceRepositoryTest extends TestCase
{
    use Makepurchase_priceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var purchase_priceRepository
     */
    protected $purchasePriceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->purchasePriceRepo = App::make(purchase_priceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatepurchase_price()
    {
        $purchasePrice = $this->fakepurchase_priceData();
        $createdpurchase_price = $this->purchasePriceRepo->create($purchasePrice);
        $createdpurchase_price = $createdpurchase_price->toArray();
        $this->assertArrayHasKey('id', $createdpurchase_price);
        $this->assertNotNull($createdpurchase_price['id'], 'Created purchase_price must have id specified');
        $this->assertNotNull(purchase_price::find($createdpurchase_price['id']), 'purchase_price with given id must be in DB');
        $this->assertModelData($purchasePrice, $createdpurchase_price);
    }

    /**
     * @test read
     */
    public function testReadpurchase_price()
    {
        $purchasePrice = $this->makepurchase_price();
        $dbpurchase_price = $this->purchasePriceRepo->find($purchasePrice->id);
        $dbpurchase_price = $dbpurchase_price->toArray();
        $this->assertModelData($purchasePrice->toArray(), $dbpurchase_price);
    }

    /**
     * @test update
     */
    public function testUpdatepurchase_price()
    {
        $purchasePrice = $this->makepurchase_price();
        $fakepurchase_price = $this->fakepurchase_priceData();
        $updatedpurchase_price = $this->purchasePriceRepo->update($fakepurchase_price, $purchasePrice->id);
        $this->assertModelData($fakepurchase_price, $updatedpurchase_price->toArray());
        $dbpurchase_price = $this->purchasePriceRepo->find($purchasePrice->id);
        $this->assertModelData($fakepurchase_price, $dbpurchase_price->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletepurchase_price()
    {
        $purchasePrice = $this->makepurchase_price();
        $resp = $this->purchasePriceRepo->delete($purchasePrice->id);
        $this->assertTrue($resp);
        $this->assertNull(purchase_price::find($purchasePrice->id), 'purchase_price should not exist in DB');
    }
}
