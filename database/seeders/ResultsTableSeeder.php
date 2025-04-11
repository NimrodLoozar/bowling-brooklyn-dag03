<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('Results')->insert([
            ['Id' => 1, 'SpelId' => 1, 'Aantalpunten' => 290],
            ['Id' => 2, 'SpelId' => 2, 'Aantalpunten' => 300],
            ['Id' => 3, 'SpelId' => 3, 'Aantalpunten' => 120],
            ['Id' => 4, 'SpelId' => 4, 'Aantalpunten' => 34],
            ['Id' => 5, 'SpelId' => 5, 'Aantalpunten' => null],
            ['Id' => 6, 'SpelId' => 6, 'Aantalpunten' => 234],
            ['Id' => 7, 'SpelId' => 7, 'Aantalpunten' => 299],
        ]);
    }
}