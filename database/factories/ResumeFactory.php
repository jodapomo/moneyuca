<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Resume;
use Faker\Generator as Faker;

$factory->define(Resume::class, function (Faker $faker) {
    return [
        'balance' => $faker->randomFloat(),
        'open_operations' => $faker->randomDigitNotNull(),
        'profits' => $faker->randomFloat(),
        'margin_available' => $faker->randomFloat(),
        'current_profits' => $faker->randomFloat(),
    ];
});
