<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class salesorderitemApiTest extends TestCase
{
    use MakesalesorderitemTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesalesorderitem()
    {
        $salesorderitem = $this->fakesalesorderitemData();
        $this->json('POST', '/api/v1/salesorderitems', $salesorderitem);

        $this->assertApiResponse($salesorderitem);
    }

    /**
     * @test
     */
    public function testReadsalesorderitem()
    {
        $salesorderitem = $this->makesalesorderitem();
        $this->json('GET', '/api/v1/salesorderitems/'.$salesorderitem->id);

        $this->assertApiResponse($salesorderitem->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesalesorderitem()
    {
        $salesorderitem = $this->makesalesorderitem();
        $editedsalesorderitem = $this->fakesalesorderitemData();

        $this->json('PUT', '/api/v1/salesorderitems/'.$salesorderitem->id, $editedsalesorderitem);

        $this->assertApiResponse($editedsalesorderitem);
    }

    /**
     * @test
     */
    public function testDeletesalesorderitem()
    {
        $salesorderitem = $this->makesalesorderitem();
        $this->json('DELETE', '/api/v1/salesorderitems/'.$salesorderitem->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/salesorderitems/'.$salesorderitem->id);

        $this->assertResponseStatus(404);
    }
}
