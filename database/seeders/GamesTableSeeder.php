<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('Games')->insert([
            ['Id' => 1, 'PersoonId' => 1, 'ReserveringId' => 1],
            ['Id' => 2, 'PersoonId' => 2, 'ReserveringId' => 2],
            ['Id' => 3, 'PersoonId' => 3, 'ReserveringId' => 3],
            ['Id' => 4, 'PersoonId' => 4, 'ReserveringId' => 5],
            ['Id' => 5, 'PersoonId' => 6, 'ReserveringId' => 5],
            ['Id' => 6, 'PersoonId' => 7, 'ReserveringId' => 5],
            ['Id' => 7, 'PersoonId' => 8, 'ReserveringId' => 5],
        ]);
    }
}