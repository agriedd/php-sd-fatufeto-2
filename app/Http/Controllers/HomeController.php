<?php

namespace App\Http\Controllers;

use App\Berita;
use App\GambarKegiatan;
use App\Kegiatan;
use App\Kelas;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function __construct(){}
    
    /**
     * mengatur alamat url (route)
     *      / atau halaman beranda
     */
    public function index(){
        return view('pages.home.home');
    }
    /**
     * mengatur alamat url (route)
     *      /profil
     */
    public function profil(){
        return view('pages.home.profil');
    }
    /**
     * mengatur alamat url (route)
     *      /guru
     */
    public function guru(){
        return view('pages.home.guru');
    }
    /**
     * mengatur alamat url (route)
     *      /siswa
     */
    public function siswa(){

        $kelas = null;
        
        request('id_kelas') && $kelas = Kelas::find(request('id_kelas'));
        return view('pages.home.siswa', [
            'kelas' => $kelas
        ]);
    }

    public function kelas(){
        return view('pages.home.kelas');
    }
    public function kegiatan(){
        $galeri     = GambarKegiatan::find(request('id_galeri'));
        $kegiatan   = Kegiatan::findOrFail(request('id_kegiatan'));

        return view('pages.home.kegiatan', [
            'galeri'    => $galeri,
            'kegiatan'  => $kegiatan
        ]);
    }
    public function pengumumanInfo($pengumuman){
        $pengumuman   = Berita::where('jenis', 'pengumuman')->where('id_berita', $pengumuman)->firstOrFail();
        return view('pages.home.pengumuman', [
            'pengumuman'  => $pengumuman
        ]);
    }
}
