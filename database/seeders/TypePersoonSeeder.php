<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade

class TypePersoonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_persoon')->insert([
            ['Id' => 1, 'Naam' => 'Klant'],
            ['Id' => 2, 'Naam' => 'Medewerker'],
            ['Id' => 3, 'Naam' => 'Gast'],
        ]);
    }
}
