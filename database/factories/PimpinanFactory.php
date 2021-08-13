<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pimpinan;
use Faker\Generator as Faker;

$factory->define(Pimpinan::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'nip' => $faker->randomNumber(9),

        'jenis_kelamin' => $faker->randomElement(['l','p']),
        'jabatan' => $faker->randomAscii(),
        'pangkat' => $faker->randomAscii(),
        'golongan' => $faker->randomAscii()
    ];
});
