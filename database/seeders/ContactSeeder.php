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
        DB::table('contact')->insert([
            ['id' => 1, 'PersoonId' => 1, 'Mobile' => '0612365478', 'Email' => 'm.jamil@gmail.com', 'IsActive' => true, 'Opmerking' => 'Personal contact'],
            ['id' => 2, 'PersoonId' => 2, 'Mobile' => '0637264532', 'Email' => 'a.ruijter@gmail.com', 'IsActive' => true, 'Opmerking' => 'Business contact'],
            ['id' => 3, 'PersoonId' => 3, 'Mobile' => '0639451238', 'Email' => 'h.odijk@gmail.com', 'IsActive' => true, 'Opmerking' => 'Client contact'],
            ['id' => 4, 'PersoonId' => 4, 'Mobile' => '0693234612', 'Email' => 'd.van.wakeren@gmail.com', 'IsActive' => true, 'Opmerking' => 'Work contact'],
            ['id' => 5, 'PersoonId' => 5, 'Mobile' => '0693234694', 'Email' => 'w.van.de.grift@gmail.com', 'IsActive' => true, 'Opmerking' => 'Employee contact'],
        ]);
    }
}
