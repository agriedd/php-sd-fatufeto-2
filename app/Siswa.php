<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model{
    protected $table = "tbl_siswa";
    protected $primaryKey = "id_siswa";
    protected $guarded = [];
    // protected $with = ['kelas'];
}
