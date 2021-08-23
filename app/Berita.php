<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model{
    protected $table = "tbl_berita";
    protected $primaryKey = "id_berita";
    protected $guarded = [];
    protected $appends = ['terbit'];
    protected $with = ['kategori'];
    protected $dates = ['tanggal_terbit', 'expired_at'];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id_kategori');
    }

    public function getTerbitAttribute(){
        return $this->attributes['tanggal_terbit'] ? '1' : '0';
    }
}
