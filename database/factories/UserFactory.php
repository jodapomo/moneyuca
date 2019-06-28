<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Role;
use App\Models\Resume;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    $investorRoleId  = Role::where('name', 'investor')->first()->id;

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'password' => bcrypt('123'), 
        'role_id' => $investorRoleId,
        'oandaToken' => Str::random(10),
        'oandaId' => Str::random(10),
        'validated' => $faker->randomElement([True, False]),
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {
    $user->resume()->save(factory(Resume::class)->make());
});
