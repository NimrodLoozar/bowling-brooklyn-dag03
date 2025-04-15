<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lane>
 */
class LaneFactory extends Factory
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

    public function Lane1(): static
    {
        return $this->state(fn(array $attributes) => [
            'Nummer' => 1,
            'HeeftHek' => false,
        ]);
    }
    public function Lane2(): static
    {
        return $this->state(fn(array $attributes) => [
            'Nummer' => 2,
            'HeeftHek' => false,
        ]);
    }
    public function Lane3(): static
    {
        return $this->state(fn(array $attributes) => [
            'Nummer' => 3,
            'HeeftHek' => false,
        ]);
    }
    public function Lane4(): static
    {
        return $this->state(fn(array $attributes) => [
            'Nummer' => 4,
            'HeeftHek' => false,
        ]);
    }
    public function Lane5(): static
    {
        return $this->state(fn(array $attributes) => [
            'Nummer' => 5,
            'HeeftHek' => false,
        ]);
    }
    public function Lane6(): static
    {
        return $this->state(fn(array $attributes) => [
            'Nummer' => 6,
            'HeeftHek' => false,
        ]);
    }
    public function Lane7(): static
    {
        return $this->state(fn(array $attributes) => [
            'Nummer' => 7,
            'HeeftHek' => true,
        ]);
    }
    public function Lane8(): static
    {
        return $this->state(fn(array $attributes) => [
            'Nummer' => 8,
            'HeeftHek' => true,
        ]);
    }
}
