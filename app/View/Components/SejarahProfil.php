<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class SejarahProfil extends Component{
    
    private $struktur_organisasi;

    public function __construct(){
        $this->struktur_organisasi = Sekolah::first()->struktur_organisasi ?? '';
    }

    public function render(){
        return view('components.sejarah-profil', [
            'struktur_organisasi' => $this->struktur_organisasi
        ]);
    }
}
