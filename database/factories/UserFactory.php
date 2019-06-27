<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    $users  = App\User::pluck('user_id')->toArray();
    $roles = App\Role::pluck('role_id')->toArray();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Str::random(9), // password
        'role_id' => $faker->randomElement($roles),
        'phone_no' => $faker->unique()->numberBetween(980,9900),
    ];
});
