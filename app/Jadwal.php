<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model{
    protected $table = 'tbl_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $guarded = [];
    protected $with = ['prasarana'];
    
    public function prasarana(){
        return $this->belongsTo(Prasarana::class, 'id_prasarana', 'id_prasarana');
    }
}
