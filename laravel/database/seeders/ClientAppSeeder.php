<?php

namespace Database\Seeders;

use App\Models\ClientApp;
use Illuminate\Database\Seeder;

class ClientAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientApp::factory()
            ->times(10)
            ->create();
    }
}
