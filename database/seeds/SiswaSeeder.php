<?php

use App\Kelas;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Kelas::all()->each(function($kelas){
            factory(App\Siswa::class, rand(10,20))->create([
                'id_kelas' => $kelas->id_kelas
            ]);
        });
    }
}
