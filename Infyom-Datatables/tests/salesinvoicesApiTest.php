<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class salesinvoicesApiTest extends TestCase
{
    use MakesalesinvoicesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesalesinvoices()
    {
        $salesinvoices = $this->fakesalesinvoicesData();
        $this->json('POST', '/api/v1/salesinvoices', $salesinvoices);

        $this->assertApiResponse($salesinvoices);
    }

    /**
     * @test
     */
    public function testReadsalesinvoices()
    {
        $salesinvoices = $this->makesalesinvoices();
        $this->json('GET', '/api/v1/salesinvoices/'.$salesinvoices->id);

        $this->assertApiResponse($salesinvoices->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesalesinvoices()
    {
        $salesinvoices = $this->makesalesinvoices();
        $editedsalesinvoices = $this->fakesalesinvoicesData();

        $this->json('PUT', '/api/v1/salesinvoices/'.$salesinvoices->id, $editedsalesinvoices);

        $this->assertApiResponse($editedsalesinvoices);
    }

    /**
     * @test
     */
    public function testDeletesalesinvoices()
    {
        $salesinvoices = $this->makesalesinvoices();
        $this->json('DELETE', '/api/v1/salesinvoices/'.$salesinvoices->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/salesinvoices/'.$salesinvoices->id);

        $this->assertResponseStatus(404);
    }
}
