<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prasarana;
use Faker\Generator as Faker;

$factory->define(Prasarana::class, function (Faker $faker) {
    return [
        'nama'          => $faker->unique()->colorName(),
        'spesifikasi'   => $faker->sentence,
        'jumlah'        => $faker->randomNumber(3),
    ];
});
