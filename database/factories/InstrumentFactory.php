<?php

use Faker\Generator as Faker;

$factory->define(App\Instrument::class, function (Faker $faker) {
    return [
        'market_id' => \App\Market::all()->random()->id,
        'name' => $faker->word,
        'description' => $faker->word,
        'tick_size' => "0.25",
        'point_value' => "50"
    ];
});
