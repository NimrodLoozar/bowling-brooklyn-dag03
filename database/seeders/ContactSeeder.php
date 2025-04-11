<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Contacts')->insert([
            ['Id' => 1, 'Persoon_id' => 1, 'Mobiel' => '0612365478', 'Email' => 'm.jamil@gmail.com', 'is_active' => true, 'Opmerking' => 'Personal contact', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['Id' => 2, 'Persoon_id' => 2, 'Mobiel' => '0637264532', 'Email' => 'a.ruijter@gmail.com', 'is_active' => true, 'Opmerking' => 'Business contact', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['Id' => 3, 'Persoon_id' => 3, 'Mobiel' => '0639451238', 'Email' => 'h.odijk@gmail.com', 'is_active' => true, 'Opmerking' => 'Client contact', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['Id' => 4, 'Persoon_id' => 4, 'Mobiel' => '0693234612', 'Email' => 'd.van.wakeren@gmail.com', 'is_active' => true, 'Opmerking' => 'Work contact', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['Id' => 5, 'Persoon_id' => 5, 'Mobiel' => '0693234694', 'Email' => 'w.van.de.grift@gmail.com', 'is_active' => true, 'Opmerking' => 'Employee contact', 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
        ]);
    }
}
