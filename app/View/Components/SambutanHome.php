<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class SambutanHome extends Component{

    private $sambutan;
    private $luas;
    private $tgl_berdiri;
    private $jenjang;
    private $npsn;

    public function __construct(){
        
        $sekolah = Sekolah::first();
        $this->sambutan = $sekolah->sambutan ?? "";
        $this->luas = $sekolah->luas_tanah;
        $this->tgl_berdiri = $sekolah->tgl_berdiri;
        $this->jenjang = $sekolah->jenjang;
        $this->npsn = $sekolah->npsn;
    }

    public function render(){
        return view('components.sambutan-home', [
            'sambutan' => $this->sambutan,
            'luas_tanah' => $this->luas,
            'tgl_berdiri' => $this->tgl_berdiri,
            'jenjang' => $this->jenjang,
            'npsn' => $this->npsn,
        ]);
    }
}
