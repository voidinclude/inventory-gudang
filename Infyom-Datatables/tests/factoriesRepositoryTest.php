<?php

use App\Models\factories;
use App\Repositories\factoriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class factoriesRepositoryTest extends TestCase
{
    use MakefactoriesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var factoriesRepository
     */
    protected $factoriesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->factoriesRepo = App::make(factoriesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatefactories()
    {
        $factories = $this->fakefactoriesData();
        $createdfactories = $this->factoriesRepo->create($factories);
        $createdfactories = $createdfactories->toArray();
        $this->assertArrayHasKey('id', $createdfactories);
        $this->assertNotNull($createdfactories['id'], 'Created factories must have id specified');
        $this->assertNotNull(factories::find($createdfactories['id']), 'factories with given id must be in DB');
        $this->assertModelData($factories, $createdfactories);
    }

    /**
     * @test read
     */
    public function testReadfactories()
    {
        $factories = $this->makefactories();
        $dbfactories = $this->factoriesRepo->find($factories->id);
        $dbfactories = $dbfactories->toArray();
        $this->assertModelData($factories->toArray(), $dbfactories);
    }

    /**
     * @test update
     */
    public function testUpdatefactories()
    {
        $factories = $this->makefactories();
        $fakefactories = $this->fakefactoriesData();
        $updatedfactories = $this->factoriesRepo->update($fakefactories, $factories->id);
        $this->assertModelData($fakefactories, $updatedfactories->toArray());
        $dbfactories = $this->factoriesRepo->find($factories->id);
        $this->assertModelData($fakefactories, $dbfactories->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletefactories()
    {
        $factories = $this->makefactories();
        $resp = $this->factoriesRepo->delete($factories->id);
        $this->assertTrue($resp);
        $this->assertNull(factories::find($factories->id), 'factories should not exist in DB');
    }
}
