<?php

namespace Database\Factories;

use App\Models\Persona;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->lastName,
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
        ];
    }
}
