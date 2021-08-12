<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    
    $jenis_kelamin = $faker->randomElement(['l', 'p']);
    $nama = $faker->name($jenis_kelamin == 'l' ? 'male' : 'female');

    return [
        'nis'           => $faker->unique()->numberBetween(1, 99999999),
        'nama_siswa'    => $nama,
        'agama'         => $faker->randomElement(['0', '1', '2', '3', '4', '5']),
        'alamat'        => $faker->address,
        'jenis_kelamin' => $jenis_kelamin,
        'tempat_lahir'  => $faker->city,
        'tanggal_lahir' => $faker->date('Y-m-d', now()->subYears(7)),
    ];
});
