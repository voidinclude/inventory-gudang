<?php

use App\Models\produk;
use App\Repositories\produkRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class produkRepositoryTest extends TestCase
{
    use MakeprodukTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var produkRepository
     */
    protected $produkRepo;

    public function setUp()
    {
        parent::setUp();
        $this->produkRepo = App::make(produkRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateproduk()
    {
        $produk = $this->fakeprodukData();
        $createdproduk = $this->produkRepo->create($produk);
        $createdproduk = $createdproduk->toArray();
        $this->assertArrayHasKey('id', $createdproduk);
        $this->assertNotNull($createdproduk['id'], 'Created produk must have id specified');
        $this->assertNotNull(produk::find($createdproduk['id']), 'produk with given id must be in DB');
        $this->assertModelData($produk, $createdproduk);
    }

    /**
     * @test read
     */
    public function testReadproduk()
    {
        $produk = $this->makeproduk();
        $dbproduk = $this->produkRepo->find($produk->id);
        $dbproduk = $dbproduk->toArray();
        $this->assertModelData($produk->toArray(), $dbproduk);
    }

    /**
     * @test update
     */
    public function testUpdateproduk()
    {
        $produk = $this->makeproduk();
        $fakeproduk = $this->fakeprodukData();
        $updatedproduk = $this->produkRepo->update($fakeproduk, $produk->id);
        $this->assertModelData($fakeproduk, $updatedproduk->toArray());
        $dbproduk = $this->produkRepo->find($produk->id);
        $this->assertModelData($fakeproduk, $dbproduk->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteproduk()
    {
        $produk = $this->makeproduk();
        $resp = $this->produkRepo->delete($produk->id);
        $this->assertTrue($resp);
        $this->assertNull(produk::find($produk->id), 'produk should not exist in DB');
    }
}
