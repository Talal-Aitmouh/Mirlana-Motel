<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChambreUser;
use App\Models\Chambre;
use App\Models\User;
use Faker\Factory as Faker;

class ChambreUserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $chambres = Chambre::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        foreach (range(1, 10) as $i) {
            ChambreUser::create([
                'chambre_id' => $faker->randomElement($chambres),
                'user_id' => $faker->randomElement($users),
                'date_arrivée' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'date_depart' => $faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d'),
            ]);
        }
    }
}
