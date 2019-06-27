<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $date = now()->endOfDay()->subHours(16); // 2018-03-25 07:59:59.999999
    $users  = App\User::pluck('user_id')->toArray();

    return [
        'body' => $faker->text(100),
        'product_owned_by' => $faker->randomElement($users),
        'amount' => $faker->numberBetween(1000,10000),
        'product_valid_from' => $date,
        'min_credit_amount' => $faker->numberBetween(999,1500),
    ];
});
