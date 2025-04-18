<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $i) {
            User::create([
                'nom' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // mot de passe par défaut
            ]);
        }
    }
}
