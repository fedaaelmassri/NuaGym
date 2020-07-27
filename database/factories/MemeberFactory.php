<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\members;
use Faker\Generator as Faker;

$factory->define(members::class, function (Faker $faker) {
    return [
        // 'id' => 'EMP' . $faker->randomNumber(5, true),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        //
    ];
});
