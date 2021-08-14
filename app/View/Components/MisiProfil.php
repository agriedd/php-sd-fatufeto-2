<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class MisiProfil extends Component
{
    private $misi;
    public function __construct(){
        $visi_misi = optional(Sekolah::first())->visi_misi;
        $this->misi = $visi_misi->misi;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.misi-profil', [
            'list_misi' => $this->misi
        ]);
    }
}
