<?php

namespace Tests\Unit;

use App\Models\ClientApp;
use App\Models\Complaint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ComplaintRelationsTest
 * @package Tests\Unit
 */
class ComplaintRelationsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp();
    }

    /** @test */
    public function relations_complaints_and_clients(): void
    {
        $client = ClientApp::factory()->create();
    
        $complaint = Complaint::factory()->create();
        
        $complaint->clientApp()->associate($client);
        $complaint->load('clientApp');

        self::assertEquals($complaint->client_id, $client->id);
    }
    
}
