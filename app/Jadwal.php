<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model{
    protected $table = 'tbl_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $guarded = [];
    protected $with = ['kelas'];
    
    // public function kelas(){
    //     return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    // }

    public function kelas(){
        return $this->belongsToMany(Kelas::class, 'jadwal_kelas', 'id_jadwal', 'id_kelas', 'id_jadwal', 'id_kelas');
    }

}
