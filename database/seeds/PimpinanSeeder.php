<?php

use App\Pimpinan;
use App\Sekolah;
use Illuminate\Database\Seeder;

class PimpinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sekolah = Sekolah::first();
        factory(Pimpinan::class, 1)->create([
            'id_profil' => $sekolah->id_profil,
        ]);
    }
}
