<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SalesPriceApiTest extends TestCase
{
    use MakeSalesPriceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSalesPrice()
    {
        $salesPrice = $this->fakeSalesPriceData();
        $this->json('POST', '/api/v1/salesPrices', $salesPrice);

        $this->assertApiResponse($salesPrice);
    }

    /**
     * @test
     */
    public function testReadSalesPrice()
    {
        $salesPrice = $this->makeSalesPrice();
        $this->json('GET', '/api/v1/salesPrices/'.$salesPrice->id);

        $this->assertApiResponse($salesPrice->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSalesPrice()
    {
        $salesPrice = $this->makeSalesPrice();
        $editedSalesPrice = $this->fakeSalesPriceData();

        $this->json('PUT', '/api/v1/salesPrices/'.$salesPrice->id, $editedSalesPrice);

        $this->assertApiResponse($editedSalesPrice);
    }

    /**
     * @test
     */
    public function testDeleteSalesPrice()
    {
        $salesPrice = $this->makeSalesPrice();
        $this->json('DELETE', '/api/v1/salesPrices/'.$salesPrice->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/salesPrices/'.$salesPrice->id);

        $this->assertResponseStatus(404);
    }
}
