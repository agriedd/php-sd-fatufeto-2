<?php

namespace App\Http\Controllers;

use App\Berita;
use App\GambarKegiatan;
use App\Kegiatan;
use App\Kelas;
use App\Prasarana;
use App\Sarana;
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
    public function guruShow($guru){
        return view('pages.home.gurushow', [
            'guru'    => $guru,
        ]);
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
    public function jadwal(){
        return view('pages.home.jadwal');
    }
    public function search(){
        return view('pages.home.pencarian');
    }
    public function kegiatanShow(){
        $galeri     = GambarKegiatan::find(request('id_galeri'));
        $kegiatan   = Kegiatan::findOrFail(request('id_kegiatan'));

        return view('pages.home.kegiatanshow', [
            'galeri'    => $galeri,
            'kegiatan'  => $kegiatan
        ]);
    }
    public function pengumumanInfo($pengumuman){
        $pengumuman   = Berita::whereHas('kategori', function($query){
            $query->where('nama_kategori', 'pengumuman');
        })->where('id_berita', $pengumuman)->firstOrFail();
        return view('pages.home.pengumuman', [
            'pengumuman'  => $pengumuman
        ]);
    }
    public function prasarana(){
        $prasarana = Prasarana::when(request('search'), function($query){
            $query->where('nama', 'like', '%'.request('search').'%');
        })
        ->paginate(10);
        return view('pages.home.prasarana', [
            'prasarana'  => $prasarana
        ]);
    }
    public function sarana(){
        $sarana = Sarana::when(request('search'), function($query){
            $query->where('nama', 'like', '%'.request('search').'%');
        })
        ->paginate(10);
        return view('pages.home.sarana', [
            'sarana'  => $sarana
        ]);
    }
    public function kegiatan(){
        $kegiatan = Kegiatan::when(request('search'), function($query){
            $query->where('nama', 'like', '%'.request('search').'%');
        })
        ->orderBy('tanggal', 'desc')
        ->orderBy('waktu', 'asc')
        ->paginate(10);
        return view('pages.home.kegiatan', [
            'kegiatan'  => $kegiatan
        ]);
    }
}
