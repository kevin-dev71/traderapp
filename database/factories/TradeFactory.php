<?php

use Faker\Generator as Faker;

$factory->define(App\Trade::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::where('role_id' , "!=" , \App\Role::ADMIN)->inRandomOrder()->first()->id,
        'instrument_id' => \App\Instrument::all()->random()->id,
        'point' => $faker->randomElement([
            '-1.25', '-2.5', '-1',
            '-0.75', '-0.5', '-0.25',
            '0', '0.25', '0.5', '0.75',
            '1' , '1.25' , '1.5' ,
            '1.75' , '2' , '2.25' ,
            '2.5' , '2.75' , '3'
        ])
    ];
});
