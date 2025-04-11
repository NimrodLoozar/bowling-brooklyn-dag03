<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UitslagSeeder extends Seeder
{
    public function run()
    {
        DB::table('uitslag')->insert([
            ['id' => 1, 'spel_id' => 1, 'aantalpunten' => 290], // Mazin Jamil
            ['id' => 2, 'spel_id' => 2, 'aantalpunten' => 300], // Arjan de Ruijter
            ['id' => 3, 'spel_id' => 3, 'aantalpunten' => 120], // Hans Odijk
            ['id' => 4, 'spel_id' => 4, 'aantalpunten' => 34],  // Dennis van Wakeren
            ['id' => 5, 'spel_id' => 5, 'aantalpunten' => null], // Gast: Tom Sanders
            ['id' => 6, 'spel_id' => 6, 'aantalpunten' => 234], // Gast: Andrew Sanders
            ['id' => 7, 'spel_id' => 7, 'aantalpunten' => 299], // Gast: Julian Kaldenheuvel
        ]);
    }
}
