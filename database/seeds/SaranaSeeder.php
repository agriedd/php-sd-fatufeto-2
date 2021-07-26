<?php

use App\Prasarana;
use App\Sarana;
use Illuminate\Database\Seeder;

class SaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Prasarana::get()->each(function($prasarana){
            factory(Sarana::class, rand(1, 4))->create([
                'id_prasarana'  => $prasarana->id_prasarana
            ]);
        });
    }
}
