<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\File;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 100),
        'style' => $faker->word,
        'retail' => $faker->word,
        'upc' => $faker->isbn13,
        'total' => $faker->numberBetween(1, 100),
        'total_wholesale' => $faker->numberBetween(1, 200),
        'total_cost' =>  $faker->numberBetween(1, 200),
        'sales' => now(),
        'sell_through' => now(),
        'ranking' => $faker->numberBetween(1, 5),
        'season' => $faker->word,
    ];
});


