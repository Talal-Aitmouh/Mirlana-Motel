<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChambreFactory extends Factory
{
    public function definition()
    {
        return [
            'type_id' => Type::inRandomOrder()->first()->id ?? Type::factory(),
            'description' => $this->faker->sentence,
            'superficie' => $this->faker->numberBetween(15, 60),
            'étage' => $this->faker->randomElement(['RDC', '1', '2', '3']),
            'prix' => $this->faker->randomFloat(2, 300, 1500),
        ];
    }
}
