<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $created_at = $faker->dateTimeBetween('-1 month')->format('Y-m-d H:i:s');
    return [
        'user_id' => 1,
        'created_at' => $created_at,
        'updated_at' => $created_at
    ];
});
