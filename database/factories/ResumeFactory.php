<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Resume;
use Faker\Generator as Faker;

$factory->define(Resume::class, function (Faker $faker) {
    return [
        'balance' => $faker->randomFloat(2,0, 9999999),
        'open_operations' => $faker->randomDigitNotNull(),
        'profits' => $faker->randomFloat(2,0, 9999),
        'margin_available' => $faker->randomFloat(2,0, 999),
        'current_profits' => $faker->randomFloat(2,0, 999),
    ];
});
