<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class stock_productsApiTest extends TestCase
{
    use Makestock_productsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatestock_products()
    {
        $stockProducts = $this->fakestock_productsData();
        $this->json('POST', '/api/v1/stockProducts', $stockProducts);

        $this->assertApiResponse($stockProducts);
    }

    /**
     * @test
     */
    public function testReadstock_products()
    {
        $stockProducts = $this->makestock_products();
        $this->json('GET', '/api/v1/stockProducts/'.$stockProducts->id);

        $this->assertApiResponse($stockProducts->toArray());
    }

    /**
     * @test
     */
    public function testUpdatestock_products()
    {
        $stockProducts = $this->makestock_products();
        $editedstock_products = $this->fakestock_productsData();

        $this->json('PUT', '/api/v1/stockProducts/'.$stockProducts->id, $editedstock_products);

        $this->assertApiResponse($editedstock_products);
    }

    /**
     * @test
     */
    public function testDeletestock_products()
    {
        $stockProducts = $this->makestock_products();
        $this->json('DELETE', '/api/v1/stockProducts/'.$stockProducts->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/stockProducts/'.$stockProducts->id);

        $this->assertResponseStatus(404);
    }
}
