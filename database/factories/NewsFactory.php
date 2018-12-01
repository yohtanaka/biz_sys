<?php

use Faker\Generator as Faker;

$factory->define(App\Models\News::class, function (Faker $faker) {
    return [
        'title'        => $faker->sentence,
        'type'         => mt_rand(1,2),
        'body'         => $faker->paragraph,
        'display_flag' => mt_rand(1,2),
        'user_id'      => 1,
    ];
});
