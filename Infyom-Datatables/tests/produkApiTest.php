<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class produkApiTest extends TestCase
{
    use MakeprodukTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateproduk()
    {
        $produk = $this->fakeprodukData();
        $this->json('POST', '/api/v1/produks', $produk);

        $this->assertApiResponse($produk);
    }

    /**
     * @test
     */
    public function testReadproduk()
    {
        $produk = $this->makeproduk();
        $this->json('GET', '/api/v1/produks/'.$produk->id);

        $this->assertApiResponse($produk->toArray());
    }

    /**
     * @test
     */
    public function testUpdateproduk()
    {
        $produk = $this->makeproduk();
        $editedproduk = $this->fakeprodukData();

        $this->json('PUT', '/api/v1/produks/'.$produk->id, $editedproduk);

        $this->assertApiResponse($editedproduk);
    }

    /**
     * @test
     */
    public function testDeleteproduk()
    {
        $produk = $this->makeproduk();
        $this->json('DELETE', '/api/v1/produks/'.$produk->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/produks/'.$produk->id);

        $this->assertResponseStatus(404);
    }
}
