<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PersoonSeeder::class,
            ReserveringSeeder::class,
            SpelSeeder::class,
            UitslagSeeder::class,
            AdminSeeder::class,
        ]);
    }
}