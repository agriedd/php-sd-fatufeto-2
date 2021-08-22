<?php

namespace App\Http\Controllers;

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
        return view('pages.home.kegiatan');
    }
}
