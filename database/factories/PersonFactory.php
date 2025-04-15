<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
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

    public function Mazin(): static
    {
        return $this->state(fn(array $atributes) =>[
            'TypePersoon' => 'Klant',
            'Voornaam' => 'Mazin',
            'Tussenvoegsel' => null,
            'Achternaam' => 'Jamil',
            'Roepnaam' => 'Mazi',
            'IsVolwassen' => true,
        ]);
    }

    public function Arjan(): static
    {
        return $this->state(fn(array $atributes) =>[
            'TypePersoon' => 'Klant',
            'Voornaam' => 'Arjan',
            'Tussenvoegsel' => 'de',
            'Achternaam' => 'Ruiter',
            'Roepnaam' => 'Arjan',
            'IsVolwassen' => true,
        ]);
    }

    public function Hans(): static
    {
        return $this->state(fn(array $atributes) =>[
            'TypePersoon' => 'Klant',
            'Voornaam' => 'Hans',
            'Tussenvoegsel' => null,
            'Achternaam' => 'Odijk',
            'Roepnaam' => 'Hans',
            'IsVolwassen' => true,
        ]);
    }
    public function Dennis(): static
    {
        return $this->state(fn(array $atributes) =>[
            'TypePersoon' => 'Klant',
            'Voornaam' => 'Dennis',
            'Tussenvoegsel' => 'van',
            'Achternaam' => 'Wakeren',
            'Roepnaam' => 'Dennis',
            'IsVolwassen' => true,
        ]);
    }

    public function Wilco(): static
    {
        return $this->state(fn(array $atributes) =>[
            'TypePersoon' => 'Medewerker',
            'Voornaam' => 'Wilco',
            'Tussenvoegsel' => 'Van de',
            'Achternaam' => 'Grift',
            'Roepnaam' => 'Wilco',
            'IsVolwassen' => true,
        ]);
    }

    public function Tom(): static
    {
        return $this->state(fn(array $attributes) => [
            'TypePersoon' => 'Gast',
            'Voornaam' => 'Tom',
            'Tussenvoegsel' => null,
            'Achternaam' => 'Sanders',
            'Roepnaam' => 'Tom',
            'IsVolwassen' => false,
        ]);
    }

    public function Andrew(): static
    {
        return $this->state(fn(array $attributes) => [
            'TypePersoon' => 'Gast',
            'Voornaam' => 'Andrew',
            'Tussenvoegsel' => null,
            'Achternaam' => 'Sanders',
            'Roepnaam' => 'Andrew',
            'IsVolwassen' => false,
        ]);
    }

    public function Julian(): static
    {
        return $this->state(fn(array $attributes) => [
            'TypePersoon' => 'Gast',
            'Voornaam' => 'Julian',
            'Tussenvoegsel' => null,
            'Achternaam' => 'Kaldenheuvel',
            'Roepnaam' => 'Julian',
            'IsVolwassen' => true,
        ]);
    }
}
