<?php

namespace Database\Seeders;

use App\Models\Lane;
use App\Models\Person;
use App\Models\Reservation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       
   

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);

        Person::factory()->Mazin()->create();
        Person::factory()->Arjan()->create();
        Person::factory()->Hans()->create();
        Person::factory()->Dennis()->create();
        Person::factory()->Wilco()->create();
        Person::factory()->Tom()->create();
        Person::factory()->Andrew()->create();
        Person::factory()->Julian()->create();

        Reservation::factory()->Reservering1()->create();
        Reservation::factory()->Reservering2()->create();
        Reservation::factory()->Reservering3()->create();
        Reservation::factory()->Reservering4()->create();
        Reservation::factory()->Reservering5()->create();
        Reservation::factory()->Reservering6()->create();

        Lane::factory()->Lane1()->create();
        Lane::factory()->Lane2()->create();
        Lane::factory()->Lane3()->create();
        Lane::factory()->Lane4()->create();
        Lane::factory()->Lane5()->create();
        Lane::factory()->Lane6()->create();
        Lane::factory()->Lane7()->create();
        Lane::factory()->Lane8()->create();

            $this->call([
            //     PersoonSeeder::class,
            // ReserveringSeeder::class,
            SpelSeeder::class,
            UitslagSeeder::class,
                PackageOptionsTableSeeder::class,
                GamesTableSeeder::class,
                ResultsTableSeeder::class,

                TypePersoonSeeder::class,
            ContactSeeder::class,
            ]);
        }
}