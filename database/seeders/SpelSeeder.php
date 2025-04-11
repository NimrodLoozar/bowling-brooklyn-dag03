<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpelSeeder extends Seeder
{
    public function run()
    {
        DB::table('spel')->insert([
            ['id' => 1, 'persoon_id' => 1, 'reservering_id' => 1],
            ['id' => 2, 'persoon_id' => 2, 'reservering_id' => 2],
            ['id' => 3, 'persoon_id' => 3, 'reservering_id' => 3],
            ['id' => 4, 'persoon_id' => 4, 'reservering_id' => 4],
            ['id' => 5, 'persoon_id' => 6, 'reservering_id' => 5],
            ['id' => 6, 'persoon_id' => 7, 'reservering_id' => 5],
            ['id' => 7, 'persoon_id' => 8, 'reservering_id' => 5],
        ]);
    }
}
