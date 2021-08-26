<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Guru extends Authenticatable {
    
    use Notifiable, HasApiTokens;

    protected $table = "tbl_guru";
    protected $primaryKey = "id_guru";
    protected $guarded = [];
    protected $with = ['kelas', 'foto'];
    
    public function kelas(){
        return $this->hasOne(Kelas::class, 'id_guru', 'id_guru')->without(['guru'])->withCount(['siswa']);
    }

    public function foto(){
        return $this->morphOne(Gambar::class, 'gambarable')->latest();
    }
}
