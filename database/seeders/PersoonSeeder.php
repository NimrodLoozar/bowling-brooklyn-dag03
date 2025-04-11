<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersoonSeeder extends Seeder
{
    public function run()
    {
        DB::table('persoon')->insert([
            ['id' => 1, 'typepersoon' => 'Klant', 'voornaam' => 'Mazin', 'tussenvoegsel' => null, 'achternaam' => 'Jamil', 'roepnaam' => 'Mazin', 'isvolwassen' => 1],
            ['id' => 2, 'typepersoon' => 'Klant', 'voornaam' => 'Arjan', 'tussenvoegsel' => 'de', 'achternaam' => 'Ruijter', 'roepnaam' => 'Arjan', 'isvolwassen' => 1],
            ['id' => 3, 'typepersoon' => 'Klant', 'voornaam' => 'Hans', 'tussenvoegsel' => null, 'achternaam' => 'Odijk', 'roepnaam' => 'Hans', 'isvolwassen' => 1],
            ['id' => 4, 'typepersoon' => 'Klant', 'voornaam' => 'Dennis', 'tussenvoegsel' => 'van', 'achternaam' => 'Wakeren', 'roepnaam' => 'Dennis', 'isvolwassen' => 1],
            ['id' => 5, 'typepersoon' => 'Medewerker', 'voornaam' => 'Wilco', 'tussenvoegsel' => 'Van de', 'achternaam' => 'Grift', 'roepnaam' => 'Wilco', 'isvolwassen' => 1],
            ['id' => 6, 'typepersoon' => 'Gast', 'voornaam' => 'Tom', 'tussenvoegsel' => null, 'achternaam' => 'Sanders', 'roepnaam' => 'Tom', 'isvolwassen' => 0],
            ['id' => 7, 'typepersoon' => 'Gast', 'voornaam' => 'Andrew', 'tussenvoegsel' => null, 'achternaam' => 'Sanders', 'roepnaam' => 'Andrew', 'isvolwassen' => 0],
            ['id' => 8, 'typepersoon' => 'Gast', 'voornaam' => 'Julian', 'tussenvoegsel' => null, 'achternaam' => 'Kaldenheuvel', 'roepnaam' => 'Julian', 'isvolwassen' => 1],
        ]);
    }
}
