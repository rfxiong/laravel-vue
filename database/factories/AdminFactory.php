<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123456'), // password
        'remember_token' => Str::random(10),
    ];
});
