<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade

class PersoonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Persoons')->insert([
            ['Id' => 1, 'type_persoon_id' => 1, 'Voornaam' => 'Mazin', 'Tussenvoegsel' => NULL, 'Achternaam' => 'Jamil', 'Roepnaam' => 'Mazin', 'is_volwassen' => true, 'is_active' => true, 'Opmerking' => 'Frequent customer', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['Id' => 2, 'type_persoon_id' => 1, 'Voornaam' => 'Arjan', 'Tussenvoegsel' => 'de', 'Achternaam' => 'Ruijter', 'Roepnaam' => 'Arjan', 'is_volwassen' => true, 'is_active' => true, 'Opmerking' => 'New client', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['Id' => 3, 'type_persoon_id' => 1, 'Voornaam' => 'Hans', 'Tussenvoegsel' => NULL, 'Achternaam' => 'Odijk', 'Roepnaam' => 'Hans', 'is_volwassen' => true, 'is_active' => true, 'Opmerking' => 'Regular client', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['Id' => 4, 'type_persoon_id' => 2, 'Voornaam' => 'Wilco', 'Tussenvoegsel' => 'van de', 'Achternaam' => 'Grift', 'Roepnaam' => 'Wilco', 'is_volwassen' => true, 'is_active' => true, 'Opmerking' => 'Employee of the month', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['Id' => 5, 'type_persoon_id' => 3, 'Voornaam' => 'Tom', 'Tussenvoegsel' => NULL, 'Achternaam' => 'Sanders', 'Roepnaam' => 'Tom', 'is_volwassen' => false, 'is_active' => true, 'Opmerking' => 'Guest visitor', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
        ]);
    }
}
