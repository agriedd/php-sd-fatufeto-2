<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kegiatan;
use Faker\Generator as Faker;

$factory->define(Kegiatan::class, function (Faker $faker) {
    return [
        'nama_kegiatan' => $faker->name,
        'lokasi' => $faker->city,
        'waktu' => $faker->dateTimeBetween('-1 years', 'now'),
        'tanggal' => $faker->date('Y-m-d'),
        'hari' => $faker->randomElement(['senin','selasa','rabu','kamis','jumat','sabtu','minggu']),
    ];
});
