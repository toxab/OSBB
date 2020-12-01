<?php

namespace Tests\Feature;

use App\Models\Complaint;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\CreatesApplication;
use Tests\TestCase;

/**
 * Class ComplaintTest
 * @package Tests\Feature
 */
class ComplaintTest extends TestCase
{
    use CreatesApplication, DatabaseMigrations;

    /**
     * @var Complaint
     */
    private $model;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $table;

    protected function setUp() : void
    {
        parent::setUp();
        Artisan::call('db:seed');
        //TODO когда будет готов
        //$this->signIn();

        $modelClass = new Complaint();
        $this->prefix = 'artifact';
        $this->model = get_class($modelClass);
        $this->table = $modelClass->getTable();
    }

    public function test_complaint_created_success(): void
    {
        
        $response = $this->json('POST', '/api/complaints', [
            'title' => 'test complaint 1234',
            'text_problem' => 'text_problem complaint 4567',
            'client_id' => 1,
        ]);
        $response->assertStatus(201);
    }
    
    public function test_complaint_create_failed_cause_wrong_clien_id(): void
    {
        
        $response = $this->json('POST', '/api/complaints', [
            'title' => 'test complaint 1234',
            'text_problem' => 'text_problem complaint 4567',
            'client_id' => 12345678,
        ]);
        $response->assertStatus(422);
    }
}
