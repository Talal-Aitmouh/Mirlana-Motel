<?php

namespace Database\Seeders;

use App\Models\Chambre;
use App\Models\ChambreUser;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
{
    Type::factory(5)->create();
    User::factory(5)->create();
    Chambre::factory(10)->create();
    ChambreUser::factory(10)->create();
}
}
