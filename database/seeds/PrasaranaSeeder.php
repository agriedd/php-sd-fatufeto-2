<?php

use App\Prasarana;
use App\Sekolah;
use Illuminate\Database\Seeder;

class PrasaranaSeeder extends Seeder{
    public function run(){
        Sekolah::get()->each(function($sekolah){
            factory(Prasarana::class, rand(1, 10))->create([
                'id_sekolah' => $sekolah->id_profil
            ]);
        });
    }
}
