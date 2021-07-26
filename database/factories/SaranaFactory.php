<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sarana;
use Faker\Generator as Faker;

$factory->define(Sarana::class, function (Faker $faker) {
    return [
        'nama'      => $faker->colorName(),
        'jumlah'    => $faker->randomNumber(5),
        'kondisi'   => $faker->randomElement(['baik', 'rusak ringan', 'rusak sedang', 'rusak berat']),
    ];
});
