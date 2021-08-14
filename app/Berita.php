<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model{
    protected $table = "tbl_berita";
    protected $primaryKey = "id_berita";
    protected $guarded = [];
    protected $appends = ['terbit'];

    public function getTerbitAttribute(){
        return $this->attributes['tanggal_terbit'] ? '1' : '0';
    }
}
