<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarKegiatan extends Model{
    protected $table = 'gambar_kegiatan';
    protected $primaryKey = 'id_gambar_kegiatan';
    protected $guarded = [];
}
