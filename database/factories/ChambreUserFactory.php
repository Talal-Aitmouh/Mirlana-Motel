<?php
namespace Database\Factories;

use App\Models\Chambre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChambreUserFactory extends Factory
{
    public function definition()
    {
        $dateArrivee = $this->faker->dateTimeBetween('now', '+1 month');
        $dateDepart = (clone $dateArrivee)->modify('+'.rand(1, 5).' days');

        return [
            'chambre_id' => Chambre::inRandomOrder()->first()->id ?? Chambre::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'date_arrivée' => $dateArrivee->format('Y-m-d'),
            'date_depart' => $dateDepart->format('Y-m-d'),
        ];
    }
}
