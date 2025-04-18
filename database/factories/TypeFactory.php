<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypeFactory extends Factory
{
    public function definition()
    {
        return [
            'titre' => $this->faker->randomElement(['Suite', 'Standard', 'Deluxe', 'Familiale']),
            'photo' => $this->faker->imageUrl(640, 480, 'hotel', true),
        ];
    }
}
