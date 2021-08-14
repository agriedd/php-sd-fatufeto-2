<?php

use App\Berita;
use App\Sekolah;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder{

    public function run(){
        Sekolah::get()->each(function($sekolah){
            factory(Berita::class, rand(10,20))->create([
                'id_profil' => $sekolah->id_profil,
            ]);
        });
    }
    
}
