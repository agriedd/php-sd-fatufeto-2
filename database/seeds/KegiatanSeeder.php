<?php

use App\Kegiatan;
use App\Sekolah;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $sekolah = Sekolah::first();
        factory(Kegiatan::class, 10)->create([
            'id_profil' => $sekolah->id_profil,
        ]);
    }
}
