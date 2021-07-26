<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model{
    protected $table = 'tbl_sarana';
    protected $primaryKey = 'id_sarana';
    protected $guarded = [];
    protected $with = ['sekolah'];
}
