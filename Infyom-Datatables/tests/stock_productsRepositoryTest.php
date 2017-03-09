<?php

use App\Models\stock_products;
use App\Repositories\stock_productsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class stock_productsRepositoryTest extends TestCase
{
    use Makestock_productsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var stock_productsRepository
     */
    protected $stockProductsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->stockProductsRepo = App::make(stock_productsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatestock_products()
    {
        $stockProducts = $this->fakestock_productsData();
        $createdstock_products = $this->stockProductsRepo->create($stockProducts);
        $createdstock_products = $createdstock_products->toArray();
        $this->assertArrayHasKey('id', $createdstock_products);
        $this->assertNotNull($createdstock_products['id'], 'Created stock_products must have id specified');
        $this->assertNotNull(stock_products::find($createdstock_products['id']), 'stock_products with given id must be in DB');
        $this->assertModelData($stockProducts, $createdstock_products);
    }

    /**
     * @test read
     */
    public function testReadstock_products()
    {
        $stockProducts = $this->makestock_products();
        $dbstock_products = $this->stockProductsRepo->find($stockProducts->id);
        $dbstock_products = $dbstock_products->toArray();
        $this->assertModelData($stockProducts->toArray(), $dbstock_products);
    }

    /**
     * @test update
     */
    public function testUpdatestock_products()
    {
        $stockProducts = $this->makestock_products();
        $fakestock_products = $this->fakestock_productsData();
        $updatedstock_products = $this->stockProductsRepo->update($fakestock_products, $stockProducts->id);
        $this->assertModelData($fakestock_products, $updatedstock_products->toArray());
        $dbstock_products = $this->stockProductsRepo->find($stockProducts->id);
        $this->assertModelData($fakestock_products, $dbstock_products->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletestock_products()
    {
        $stockProducts = $this->makestock_products();
        $resp = $this->stockProductsRepo->delete($stockProducts->id);
        $this->assertTrue($resp);
        $this->assertNull(stock_products::find($stockProducts->id), 'stock_products should not exist in DB');
    }
}
