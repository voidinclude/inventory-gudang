<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class factoriesApiTest extends TestCase
{
    use MakefactoriesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatefactories()
    {
        $factories = $this->fakefactoriesData();
        $this->json('POST', '/api/v1/factories', $factories);

        $this->assertApiResponse($factories);
    }

    /**
     * @test
     */
    public function testReadfactories()
    {
        $factories = $this->makefactories();
        $this->json('GET', '/api/v1/factories/'.$factories->id);

        $this->assertApiResponse($factories->toArray());
    }

    /**
     * @test
     */
    public function testUpdatefactories()
    {
        $factories = $this->makefactories();
        $editedfactories = $this->fakefactoriesData();

        $this->json('PUT', '/api/v1/factories/'.$factories->id, $editedfactories);

        $this->assertApiResponse($editedfactories);
    }

    /**
     * @test
     */
    public function testDeletefactories()
    {
        $factories = $this->makefactories();
        $this->json('DELETE', '/api/v1/factories/'.$factories->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/factories/'.$factories->id);

        $this->assertResponseStatus(404);
    }
}
