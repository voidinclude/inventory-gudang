<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class companyApiTest extends TestCase
{
    use MakecompanyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecompany()
    {
        $company = $this->fakecompanyData();
        $this->json('POST', '/api/v1/companies', $company);

        $this->assertApiResponse($company);
    }

    /**
     * @test
     */
    public function testReadcompany()
    {
        $company = $this->makecompany();
        $this->json('GET', '/api/v1/companies/'.$company->id);

        $this->assertApiResponse($company->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecompany()
    {
        $company = $this->makecompany();
        $editedcompany = $this->fakecompanyData();

        $this->json('PUT', '/api/v1/companies/'.$company->id, $editedcompany);

        $this->assertApiResponse($editedcompany);
    }

    /**
     * @test
     */
    public function testDeletecompany()
    {
        $company = $this->makecompany();
        $this->json('DELETE', '/api/v1/companies/'.$company->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/companies/'.$company->id);

        $this->assertResponseStatus(404);
    }
}
