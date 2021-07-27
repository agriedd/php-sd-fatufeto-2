<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jadwal;
use Faker\Generator as Faker;

$factory->define(Jadwal::class, function (Faker $faker) {
    return [
        'mata_pelajaran'    => $faker->randomElement(['Bahasa Indonesia', 'Bahasa Inggris', 'Matematika', 'IPA', 'IPS', 'Seni Budaya', 'PPKN', 'PLSBD', 'Pejaskes', 'Agama']),
        'hari'              => $faker->randomElement([1,2,3,4,5,6]),
        'tanggal'           => now(),
    ];
});
