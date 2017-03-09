<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class receivesApiTest extends TestCase
{
    use MakereceivesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatereceives()
    {
        $receives = $this->fakereceivesData();
        $this->json('POST', '/api/v1/receives', $receives);

        $this->assertApiResponse($receives);
    }

    /**
     * @test
     */
    public function testReadreceives()
    {
        $receives = $this->makereceives();
        $this->json('GET', '/api/v1/receives/'.$receives->id);

        $this->assertApiResponse($receives->toArray());
    }

    /**
     * @test
     */
    public function testUpdatereceives()
    {
        $receives = $this->makereceives();
        $editedreceives = $this->fakereceivesData();

        $this->json('PUT', '/api/v1/receives/'.$receives->id, $editedreceives);

        $this->assertApiResponse($editedreceives);
    }

    /**
     * @test
     */
    public function testDeletereceives()
    {
        $receives = $this->makereceives();
        $this->json('DELETE', '/api/v1/receives/'.$receives->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/receives/'.$receives->id);

        $this->assertResponseStatus(404);
    }
}
