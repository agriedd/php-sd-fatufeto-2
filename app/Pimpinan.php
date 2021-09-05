<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Pimpinan extends Authenticatable {
    
    use Notifiable, HasApiTokens;

    protected $table = "tbl_pimpinan";
    protected $primaryKey = "id_pimpinan";
    protected $guarded = [];
    protected $with = ['sekolah', 'foto'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sekolah(){
        return $this->belongsTo(Sekolah::class, 'id_profil', 'id_profil');
    }
    
    public function foto(){
        return $this->morphOne(Gambar::class, 'gambarable')->latest();
    }
}
