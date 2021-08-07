<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model{
    protected $table = "tbl_guru";
    protected $primaryKey = "id_guru";
    protected $guarded = [];
    protected $with = ['kelas'];
    
    public function kelas(){
        return $this->hasOne(Kelas::class, 'id_guru', 'id_guru')->without(['guru']);
    }
}
