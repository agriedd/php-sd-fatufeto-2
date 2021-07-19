<?php

namespace App\Http\Controllers;

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
}
