<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\EloquentFactories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->date(); // startdatum als 'Y-m-d'
        $endDate   = fake()->optional()->dateTimeBetween($startDate, '+2 years');

        return [
            'name'        => fake()->catchPhrase(),
            'description' => fake()->paragraph(),
            'start_date'  => $startDate,
            'end_date'    => $endDate?->format('Y-m-d'),
            'status'      => fake()->randomElement(['ongoing', 'finished', 'idea']),
        ];
    }
}
