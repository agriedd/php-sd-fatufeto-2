<?php

use App\Jadwal;
use App\Prasarana;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Prasarana::get()->each(function($prasarana){
            factory(Jadwal::class, rand(1, 5))->create([
                'id_prasarana'  => $prasarana->id_prasarana
            ]);
        });
    }
}
