<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpelSeeder extends Seeder
{
    public function run()
    {
        DB::table('spel')->insert([
            ['id' => 1, 'persoon_id' => 1, 'reservering_id' => 1], // Mazin Jamil
            ['id' => 2, 'persoon_id' => 2, 'reservering_id' => 2], // Arjan de Ruijter
            ['id' => 3, 'persoon_id' => 3, 'reservering_id' => 3], // Hans Odijk
            ['id' => 4, 'persoon_id' => 4, 'reservering_id' => 4], // Dennis van Wakeren
            ['id' => 5, 'persoon_id' => 6, 'reservering_id' => 5], // Gast: Tom Sanders
            ['id' => 6, 'persoon_id' => 7, 'reservering_id' => 5], // Gast: Andrew Sanders
            ['id' => 7, 'persoon_id' => 8, 'reservering_id' => 5], // Gast: Julian Kaldenheuvel
            ['id' => 8, 'persoon_id' => 5, 'reservering_id' => 6], // Wilco (Medewerker)
        ]);
    }
}
