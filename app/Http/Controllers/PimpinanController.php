<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PimpinanController extends Controller{
    public function index(){
        return view('pages.pimpinan.index');
    }
}
