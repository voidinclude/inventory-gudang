<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class customersApiTest extends TestCase
{
    use MakecustomersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecustomers()
    {
        $customers = $this->fakecustomersData();
        $this->json('POST', '/api/v1/customers', $customers);

        $this->assertApiResponse($customers);
    }

    /**
     * @test
     */
    public function testReadcustomers()
    {
        $customers = $this->makecustomers();
        $this->json('GET', '/api/v1/customers/'.$customers->id);

        $this->assertApiResponse($customers->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecustomers()
    {
        $customers = $this->makecustomers();
        $editedcustomers = $this->fakecustomersData();

        $this->json('PUT', '/api/v1/customers/'.$customers->id, $editedcustomers);

        $this->assertApiResponse($editedcustomers);
    }

    /**
     * @test
     */
    public function testDeletecustomers()
    {
        $customers = $this->makecustomers();
        $this->json('DELETE', '/api/v1/customers/'.$customers->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/customers/'.$customers->id);

        $this->assertResponseStatus(404);
    }
}
