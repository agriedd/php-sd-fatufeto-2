<?php

namespace App;

use App\Casts\StrukturOrganisasi;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model{
    protected $table = "tbl_sekolah";
    protected $primaryKey = "id_profil";
    protected $guarded = [];
    protected $casts = [
        'struktur_organisasi' => StrukturOrganisasi::class
    ];
}
