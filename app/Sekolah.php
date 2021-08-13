<?php

namespace App;

use App\Casts\StrukturOrganisasi;
use App\Casts\VisiMisiCast;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model{
    protected $table = "tbl_sekolah";
    protected $primaryKey = "id_profil";
    protected $guarded = [];
    protected $casts = [
        'struktur_organisasi' => StrukturOrganisasi::class,
        'visi_misi' => VisiMisiCast::class,
    ];

    public function pimpinan(){
        return $this->hasOne(Pimpinan::class, 'id_profil', 'id_profil')->latest();
    }
}
