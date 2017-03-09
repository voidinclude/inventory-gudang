<?php

use App\Models\receives;
use App\Repositories\receivesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class receivesRepositoryTest extends TestCase
{
    use MakereceivesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var receivesRepository
     */
    protected $receivesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->receivesRepo = App::make(receivesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatereceives()
    {
        $receives = $this->fakereceivesData();
        $createdreceives = $this->receivesRepo->create($receives);
        $createdreceives = $createdreceives->toArray();
        $this->assertArrayHasKey('id', $createdreceives);
        $this->assertNotNull($createdreceives['id'], 'Created receives must have id specified');
        $this->assertNotNull(receives::find($createdreceives['id']), 'receives with given id must be in DB');
        $this->assertModelData($receives, $createdreceives);
    }

    /**
     * @test read
     */
    public function testReadreceives()
    {
        $receives = $this->makereceives();
        $dbreceives = $this->receivesRepo->find($receives->id);
        $dbreceives = $dbreceives->toArray();
        $this->assertModelData($receives->toArray(), $dbreceives);
    }

    /**
     * @test update
     */
    public function testUpdatereceives()
    {
        $receives = $this->makereceives();
        $fakereceives = $this->fakereceivesData();
        $updatedreceives = $this->receivesRepo->update($fakereceives, $receives->id);
        $this->assertModelData($fakereceives, $updatedreceives->toArray());
        $dbreceives = $this->receivesRepo->find($receives->id);
        $this->assertModelData($fakereceives, $dbreceives->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletereceives()
    {
        $receives = $this->makereceives();
        $resp = $this->receivesRepo->delete($receives->id);
        $this->assertTrue($resp);
        $this->assertNull(receives::find($receives->id), 'receives should not exist in DB');
    }
}
