<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\City;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'email'          => $faker->unique()->safeEmail,
        'password'       => Hash::make(str_random(8)),
        'role'           => array_rand(User::$roles),
        'code'           => $faker->unique()->numberBetween(4, 100),
        'last_name'      => $faker->lastName,
        'first_name'     => $faker->firstName,
        'l_n_kana'       => $faker->lastKanaName,
        'f_n_kana'       => $faker->firstKanaName,
        'gender'         => array_rand(User::$gender),
        'birthday'       => $faker->dateTime->format('Y-m-d'),
        'zip'            => $faker->postcode,
        'city_code'      => 1,
        'street'         => $faker->streetAddress,
        'building'       => $faker->secondaryAddress,
        'tel_private'    => $faker->phoneNumber,
        'tel_work'       => $faker->phoneNumber,
        'section_code'   => 4,
        'position_code'  => 1,
        'remember_token' => str_random(10),
    ];
});
