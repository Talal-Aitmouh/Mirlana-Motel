<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['titre' => 'Suite Royale', 'photo' => 'suite.jpg'],
            ['titre' => 'Chambre Standard', 'photo' => 'standard.jpg'],
            ['titre' => 'Chambre Familiale', 'photo' => 'familiale.jpg'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
