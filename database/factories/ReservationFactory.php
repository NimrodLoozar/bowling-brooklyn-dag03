<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function Reservering1(): static
    {
        return $this->state(fn(array $attributes) => [
            'PersoonId' => 1,
            'OpeningstijdId' => 2,
            'BaanId' => 8,
            'PakketOptieId' => 1,
            'ReserveringsStatus' => 'Bevestigd',
            'ReserveringsNummer' => 2022122000001,
            'datum' => '2022-12-20',
            'AantalUren' => 1,
            'BeginTijd' => '15:00',
            'EindTijd' => '16:00',
            'AantalVolwassen' => 4,
            'AantalKinderen' => 2,
        ]);
    }
    public function Reservering2(): static
    {
        return $this->state(fn(array $attributes) => [
            'PersoonId' => 2,
            'OpeningstijdId' => 2,
            'BaanId' => 2,
            'PakketOptieId' => 3,
            'ReserveringsStatus' => 'Bevestigd',
            'ReserveringsNummer' => 2022122000002,
            'datum' => '2022-12-20',
            'AantalUren' => 1,
            'BeginTijd' => '17:00',
            'EindTijd' => '18:00',
            'AantalVolwassen' => 4,
            'AantalKinderen' => null,
        ]);
    }
    public function Reservering3(): static
    {
        return $this->state(fn(array $attributes) => [
            'PersoonId' => 3,
            'OpeningstijdId' => 7,
            'BaanId' => 3,
            'PakketOptieId' => 1,
            'ReserveringsStatus' => 'Bevestigd',
            'ReserveringsNummer' => 2022122400003,
            'datum' => '2022-12-24',
            'AantalUren' => 2,
            'BeginTijd' => '16:00',
            'EindTijd' => '18:00',
            'AantalVolwassen' => 4,
            'AantalKinderen' => null,
        ]);
    } 
    public function Reservering4(): static
    {
        return $this->state(fn(array $attributes) => [
            'PersoonId' => 1,
            'OpeningstijdId' => 2,
            'BaanId' => 6,
            'PakketOptieId' => null,
            'ReserveringsStatus' => 'Bevestigd',
            'ReserveringsNummer' => 2022122700004,
            'datum' => '2022-12-27',
            'AantalUren' => 2,
            'BeginTijd' => '17:00',
            'EindTijd' => '19:00',
            'AantalVolwassen' => 2,
            'AantalKinderen' => null,
        ]);
    }
    public function Reservering5(): static
    {
        return $this->state(fn(array $attributes) => [
            'PersoonId' => 4,
            'OpeningstijdId' => 3,
            'BaanId' => 4,
            'PakketOptieId' => 4,
            'ReserveringsStatus' => 'Bevestigd',
            'ReserveringsNummer' => 2022122800005,
            'datum' => '2022-12-28',
            'AantalUren' => 1,
            'BeginTijd' => '14:00',
            'EindTijd' => '15:00',
            'AantalVolwassen' => 3,
            'AantalKinderen' => null,
        ]);
    }
    public function Reservering6(): static
    {
        return $this->state(fn(array $attributes) => [
            'PersoonId' => 5,
            'OpeningstijdId' => 10,
            'BaanId' => 5,
            'PakketOptieId' => 4,
            'ReserveringsStatus' => 'Bevestigd',
            'ReserveringsNummer' => 2022122800006,
            'datum' => '2022-12-28',
            'AantalUren' => 2,
            'BeginTijd' => '19:00',
            'EindTijd' => '21:00',
            'AantalVolwassen' => 2,
            'AantalKinderen' => null,
        ]);
    }

}
