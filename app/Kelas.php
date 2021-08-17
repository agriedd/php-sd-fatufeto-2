<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model{
    protected $table = 'tbl_kelas';
    protected $primaryKey = 'id_kelas';
    protected $guarded = [];
    protected $with = ['guru'];
    
    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
    public function siswa(){
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
    }
    public function siswa_laki_laki(){
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas')->where('jenis_kelamin', 'l');
    }
    public function siswa_perempuan(){
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas')->where('jenis_kelamin', 'p');
    }
}
