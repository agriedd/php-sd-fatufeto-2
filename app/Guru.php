<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model{
    protected $table = "tbl_guru";
    protected $primaryKey = "id_guru";
    protected $guarded = [];
}
