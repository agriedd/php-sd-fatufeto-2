<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    protected $table = "tbl_pimpinan";
    protected $primaryKey = "id_pimpinan";
    protected $guarded = [];
    protected $with = ['sekolah'];

    public function sekolah(){
        return $this->belongsTo(Sekolah::class, 'id_profil', 'id_profil');
    }
}
