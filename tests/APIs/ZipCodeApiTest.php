<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ZipCode;

class ZipCodeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_zip_code()
    {
        $zipCode = ZipCode::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/zip_codes', $zipCode
        );

        $this->assertApiResponse($zipCode);
    }

    /**
     * @test
     */
    public function test_read_zip_code()
    {
        $zipCode = ZipCode::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/zip_codes/'.$zipCode->id
        );

        $this->assertApiResponse($zipCode->toArray());
    }

    /**
     * @test
     */
    public function test_update_zip_code()
    {
        $zipCode = ZipCode::factory()->create();
        $editedZipCode = ZipCode::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/zip_codes/'.$zipCode->id,
            $editedZipCode
        );

        $this->assertApiResponse($editedZipCode);
    }

    /**
     * @test
     */
    public function test_delete_zip_code()
    {
        $zipCode = ZipCode::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/zip_codes/'.$zipCode->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/zip_codes/'.$zipCode->id
        );

        $this->response->assertStatus(404);
    }
}
