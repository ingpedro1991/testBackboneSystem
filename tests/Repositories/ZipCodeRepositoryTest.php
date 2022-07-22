<?php namespace Tests\Repositories;

use App\Models\ZipCode;
use App\Repositories\ZipCodeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ZipCodeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ZipCodeRepository
     */
    protected $zipCodeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->zipCodeRepo = \App::make(ZipCodeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_zip_code()
    {
        $zipCode = ZipCode::factory()->make()->toArray();

        $createdZipCode = $this->zipCodeRepo->create($zipCode);

        $createdZipCode = $createdZipCode->toArray();
        $this->assertArrayHasKey('id', $createdZipCode);
        $this->assertNotNull($createdZipCode['id'], 'Created ZipCode must have id specified');
        $this->assertNotNull(ZipCode::find($createdZipCode['id']), 'ZipCode with given id must be in DB');
        $this->assertModelData($zipCode, $createdZipCode);
    }

    /**
     * @test read
     */
    public function test_read_zip_code()
    {
        $zipCode = ZipCode::factory()->create();

        $dbZipCode = $this->zipCodeRepo->find($zipCode->id);

        $dbZipCode = $dbZipCode->toArray();
        $this->assertModelData($zipCode->toArray(), $dbZipCode);
    }

    /**
     * @test update
     */
    public function test_update_zip_code()
    {
        $zipCode = ZipCode::factory()->create();
        $fakeZipCode = ZipCode::factory()->make()->toArray();

        $updatedZipCode = $this->zipCodeRepo->update($fakeZipCode, $zipCode->id);

        $this->assertModelData($fakeZipCode, $updatedZipCode->toArray());
        $dbZipCode = $this->zipCodeRepo->find($zipCode->id);
        $this->assertModelData($fakeZipCode, $dbZipCode->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_zip_code()
    {
        $zipCode = ZipCode::factory()->create();

        $resp = $this->zipCodeRepo->delete($zipCode->id);

        $this->assertTrue($resp);
        $this->assertNull(ZipCode::find($zipCode->id), 'ZipCode should not exist in DB');
    }
}
