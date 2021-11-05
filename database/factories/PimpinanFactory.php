<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pimpinan;
use Faker\Generator as Faker;

$factory->define(Pimpinan::class, function (Faker $faker) {
    return [
        'nama' => 'Maria Elisabeth Rae, S.Pd',
        'nip' => '196511051986072001',
        'jenis_kelamin' => $faker->randomElement(['l','p']),
        'jabatan' => $faker->randomAscii(),
        'pangkat' => $faker->randomAscii(),
        'golongan' => $faker->randomAscii()
    ];
});
