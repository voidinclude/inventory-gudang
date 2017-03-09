<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class purchase_priceApiTest extends TestCase
{
    use Makepurchase_priceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatepurchase_price()
    {
        $purchasePrice = $this->fakepurchase_priceData();
        $this->json('POST', '/api/v1/purchasePrices', $purchasePrice);

        $this->assertApiResponse($purchasePrice);
    }

    /**
     * @test
     */
    public function testReadpurchase_price()
    {
        $purchasePrice = $this->makepurchase_price();
        $this->json('GET', '/api/v1/purchasePrices/'.$purchasePrice->id);

        $this->assertApiResponse($purchasePrice->toArray());
    }

    /**
     * @test
     */
    public function testUpdatepurchase_price()
    {
        $purchasePrice = $this->makepurchase_price();
        $editedpurchase_price = $this->fakepurchase_priceData();

        $this->json('PUT', '/api/v1/purchasePrices/'.$purchasePrice->id, $editedpurchase_price);

        $this->assertApiResponse($editedpurchase_price);
    }

    /**
     * @test
     */
    public function testDeletepurchase_price()
    {
        $purchasePrice = $this->makepurchase_price();
        $this->json('DELETE', '/api/v1/purchasePrices/'.$purchasePrice->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/purchasePrices/'.$purchasePrice->id);

        $this->assertResponseStatus(404);
    }
}
