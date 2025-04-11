<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UitslagSeeder extends Seeder
{
    public function run()
    {
        DB::table('uitslag')->insert([
            ['id' => 1, 'spel_id' => 1, 'aantalpunten' => 290],
            ['id' => 2, 'spel_id' => 2, 'aantalpunten' => 300],
            ['id' => 3, 'spel_id' => 3, 'aantalpunten' => 120],
            ['id' => 4, 'spel_id' => 4, 'aantalpunten' => 34],
            ['id' => 5, 'spel_id' => 5, 'aantalpunten' => null],
            ['id' => 6, 'spel_id' => 6, 'aantalpunten' => 234],
            ['id' => 7, 'spel_id' => 7, 'aantalpunten' => 299],
        ]);
    }
}
