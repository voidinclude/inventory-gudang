<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class salespaymentsApiTest extends TestCase
{
    use MakesalespaymentsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesalespayments()
    {
        $salespayments = $this->fakesalespaymentsData();
        $this->json('POST', '/api/v1/salespayments', $salespayments);

        $this->assertApiResponse($salespayments);
    }

    /**
     * @test
     */
    public function testReadsalespayments()
    {
        $salespayments = $this->makesalespayments();
        $this->json('GET', '/api/v1/salespayments/'.$salespayments->id);

        $this->assertApiResponse($salespayments->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesalespayments()
    {
        $salespayments = $this->makesalespayments();
        $editedsalespayments = $this->fakesalespaymentsData();

        $this->json('PUT', '/api/v1/salespayments/'.$salespayments->id, $editedsalespayments);

        $this->assertApiResponse($editedsalespayments);
    }

    /**
     * @test
     */
    public function testDeletesalespayments()
    {
        $salespayments = $this->makesalespayments();
        $this->json('DELETE', '/api/v1/salespayments/'.$salespayments->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/salespayments/'.$salespayments->id);

        $this->assertResponseStatus(404);
    }
}
