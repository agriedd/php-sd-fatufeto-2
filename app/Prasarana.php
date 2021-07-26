<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prasarana extends Model{
    protected $table = 'tbl_prasarana';
    protected $primaryKey = 'id_prasarana';
    protected $guarded = [];
    protected $with = ['sekolah'];

    public function sekolah(){
        return $this->belongsTo(Sekolah::class, 'id_sekolah', 'id_profil');
    }
}
