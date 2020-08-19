<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaction;
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

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        //'user_id' => factory(User::class)->make()->id,
        'user_id' => $faker->randomDigit,
        'type' => $faker->randomElement(['debit', 'credit']),
        'amount' => $faker->randomDigit,
    ];
});
