<?php

use Faker\Generator as Faker;

$factory->define(App\Models\News::class, function (Faker $faker) {
    return [
        'title'        => $faker->sentence,
        'type'         => rand(1,2),
        'body'         => $faker->paragraph,
        'display_flag' => rand(1,2),
        'user_id'      => 1,
    ];
});
