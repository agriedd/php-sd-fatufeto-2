<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class AlamatHome extends Component
{

    private $alamat;
    public function __construct(){
        $sekolah = Sekolah::first();
        $this->alamat = $sekolah->alamat;
    }

    public function render(){
        return view('components.alamat-home', [
            'alamat' => $this->alamat,
        ]);
    }
}