<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worship>
 */
class WorshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 3),
            'title' => fake()->title(),
            'preacher' => fake()->name(),
            'singer' => fake()->name(),
            'place' => fake()->address(),
            'date' => fake()->date(),
        ];
    }
}
