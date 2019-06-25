<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Application::class, function (Faker $faker) {
    $users  = App\User::pluck('user_id')->toArray();
    $product = App\Product::pluck('product_id')->toArray();
    return [
        'product' => $faker->randomElement($product),
        'user_id' => $faker->randomElement($users),

    ];
});
