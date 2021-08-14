<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class VisiProfil extends Component{

    private $visi;

    public function __construct(){
        $visi_misi = optional(Sekolah::first())->visi_misi;
        $this->visi = $visi_misi->visi;
    }

    public function render(){
        return view('components.visi-profil', [
            'list_visi' => $this->visi
        ]);
    }
}
