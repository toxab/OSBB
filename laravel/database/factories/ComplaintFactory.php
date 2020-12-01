<?php

namespace Database\Factories;

use App\Models\ClientApp;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $clientAppCount = ClientApp::all()->count();
        return [
            'title' => $this->faker->text(50),
            'text_problem' => $this->faker->text(150),
            'client_id' => $this->faker->numberBetween(1, $clientAppCount),
            'in_work' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
