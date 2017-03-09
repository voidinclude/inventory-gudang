<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suppliersApiTest extends TestCase
{
    use MakesuppliersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuppliers()
    {
        $suppliers = $this->fakesuppliersData();
        $this->json('POST', '/api/v1/suppliers', $suppliers);

        $this->assertApiResponse($suppliers);
    }

    /**
     * @test
     */
    public function testReadsuppliers()
    {
        $suppliers = $this->makesuppliers();
        $this->json('GET', '/api/v1/suppliers/'.$suppliers->id);

        $this->assertApiResponse($suppliers->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuppliers()
    {
        $suppliers = $this->makesuppliers();
        $editedsuppliers = $this->fakesuppliersData();

        $this->json('PUT', '/api/v1/suppliers/'.$suppliers->id, $editedsuppliers);

        $this->assertApiResponse($editedsuppliers);
    }

    /**
     * @test
     */
    public function testDeletesuppliers()
    {
        $suppliers = $this->makesuppliers();
        $this->json('DELETE', '/api/v1/suppliers/'.$suppliers->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suppliers/'.$suppliers->id);

        $this->assertResponseStatus(404);
    }
}
