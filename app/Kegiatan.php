<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model{
    protected $table = 'tbl_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $guarded = [];
    protected $with = ['cover'];

    public function cover(){
        return $this->hasOne(GambarKegiatan::class, 'id_kegiatan', 'id_kegiatan');
    }

}
