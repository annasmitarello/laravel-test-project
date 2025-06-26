<?php

namespace Database\Factories;

use App\Models\Auto;
use Faker\Generator as Faker;

$factory->define(Auto::class, function (Faker $faker) {
    return [
        'color' => $faker->word,
        'modelo' => $faker->word,
        'patente' => $faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
    ];
});
