<?php

use App\Models\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellido'=> $faker->lastname,
        'fecha_nacimiento' => $faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
    ];
});
