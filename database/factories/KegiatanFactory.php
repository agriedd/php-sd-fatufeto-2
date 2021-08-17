<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kegiatan;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Kegiatan::class, function (Faker $faker) {
    $date = $faker->dateTimeBetween('-1days', '+1 days');
    $date = Carbon::make($date);
    $tanggal = $date->format('Y-m-d');
    $waktu = $date->format('H:i:s');
    $isDialy = $faker->boolean();
    if($isDialy)
        $hari = strtolower($date->locale('id-ID')->translatedFormat('l'));

    return [
        'nama_kegiatan' => "Kegiatan {$faker->name}",
        'lokasi' => $faker->city,
        'waktu' => $waktu,
        'tanggal' => $tanggal,
        'hari' => $isDialy ? $hari : null,
    ];
});
