<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model{
    protected $table = 'tbl_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $guarded = [];
    // protected $with = ['sekolah'];
}
