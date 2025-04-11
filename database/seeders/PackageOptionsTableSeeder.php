<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageOptionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('PackageOptions')->insert([
            ['Id' => 1, 'Naam' => 'Standaard'],
            ['Id' => 2, 'Naam' => 'Deluxe'],
            ['Id' => 3, 'Naam' => 'Familie'],
            ['Id' => 4, 'Naam' => 'Avond'],
        ]);
    }
}