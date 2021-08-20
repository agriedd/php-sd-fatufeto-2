<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarKegiatan extends Model{
    protected $table = 'gambar_kegiatan';
    protected $primaryKey = 'id_gambar_kegiatan';
    protected $guarded = [];

    protected $with = ['foto'];

    /**
     * foto function morphOne on Gambar model
     * 
     */
    public function foto(){
        return $this->morphOne(Gambar::class, 'gambarable')->latest();
    }

}
