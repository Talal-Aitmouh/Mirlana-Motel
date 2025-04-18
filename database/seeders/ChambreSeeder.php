<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chambre;
use App\Models\Type;
use Faker\Factory as Faker;

class ChambreSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $types = Type::pluck('id')->toArray(); // Récupère tous les ids des types

        foreach (range(1, 10) as $i) {
            Chambre::create([
                'type_id' => $faker->randomElement($types),
                'description' => $faker->sentence,
                'superficie' => $faker->numberBetween(15, 60),
                'étage' => $faker->randomElement(['RDC', '1', '2', '3']),
                'prix' => $faker->randomFloat(2, 300, 2000),
            ]);
        }
    }
}
