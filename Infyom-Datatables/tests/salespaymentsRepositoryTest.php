<?php

use App\Models\salespayments;
use App\Repositories\salespaymentsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class salespaymentsRepositoryTest extends TestCase
{
    use MakesalespaymentsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var salespaymentsRepository
     */
    protected $salespaymentsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->salespaymentsRepo = App::make(salespaymentsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesalespayments()
    {
        $salespayments = $this->fakesalespaymentsData();
        $createdsalespayments = $this->salespaymentsRepo->create($salespayments);
        $createdsalespayments = $createdsalespayments->toArray();
        $this->assertArrayHasKey('id', $createdsalespayments);
        $this->assertNotNull($createdsalespayments['id'], 'Created salespayments must have id specified');
        $this->assertNotNull(salespayments::find($createdsalespayments['id']), 'salespayments with given id must be in DB');
        $this->assertModelData($salespayments, $createdsalespayments);
    }

    /**
     * @test read
     */
    public function testReadsalespayments()
    {
        $salespayments = $this->makesalespayments();
        $dbsalespayments = $this->salespaymentsRepo->find($salespayments->id);
        $dbsalespayments = $dbsalespayments->toArray();
        $this->assertModelData($salespayments->toArray(), $dbsalespayments);
    }

    /**
     * @test update
     */
    public function testUpdatesalespayments()
    {
        $salespayments = $this->makesalespayments();
        $fakesalespayments = $this->fakesalespaymentsData();
        $updatedsalespayments = $this->salespaymentsRepo->update($fakesalespayments, $salespayments->id);
        $this->assertModelData($fakesalespayments, $updatedsalespayments->toArray());
        $dbsalespayments = $this->salespaymentsRepo->find($salespayments->id);
        $this->assertModelData($fakesalespayments, $dbsalespayments->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesalespayments()
    {
        $salespayments = $this->makesalespayments();
        $resp = $this->salespaymentsRepo->delete($salespayments->id);
        $this->assertTrue($resp);
        $this->assertNull(salespayments::find($salespayments->id), 'salespayments should not exist in DB');
    }
}
