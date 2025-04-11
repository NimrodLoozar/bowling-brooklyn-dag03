<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypePerson>
 */
class TypePersonFactory extends Factory
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

    public function Klant(): array
    {
        return [
            'TypePersoon' => 'Klant',
        ];
    }
    public function Medewerker(): array
    {
        return [
            'TypePersoon' => 'Medewerker',
        ];
    }
    public function Gast(): array
    {
        return [
            'TypePersoon' => 'Gast',
        ];
    }
}
