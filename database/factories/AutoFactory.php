<?php

namespace Database\Factories;

use App\Models\Auto;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auto>
 */

class AutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Auto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'color' => $this->faker->word,
            'modelo' => $this->faker->word,
            'patente' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
        ];
    }
}