<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Berita;
use Faker\Generator as Faker;

$factory->define(Berita::class, function (Faker $faker) {
    $jenis = $faker->randomElement(['berita', 'pengumuman']);
    $isBerita = $jenis == 'berita';
    return [
        'judul' => $faker->sentence,
        'isi' => $faker->paragraph,
        'jenis' => $jenis,
        'deskripsi' => $faker->paragraph,
        'kontributor' => $faker->name,
        'expired_at' => !$isBerita ? $faker->dateTimeBetween('-1 years', '1 years') : null,
        'tanggal_terbit' => $faker->dateTimeBetween('-1 years', 'now'),
    ];
});
