<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Collaborator;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(App\Collaborator::class, function (Faker $faker) {
    return [
        'Sector' => 'Administractive',
        'full_name' => $faker->name,
        'birth_date' => $faker->date('Y-m-d'),
        'salary' => mt_rand(1500, 2000),
        'status' => true,
    ];
});
