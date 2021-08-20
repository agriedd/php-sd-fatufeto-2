<?php

namespace App\View\Components;

use App\GambarKegiatan;
use Illuminate\View\Component;

class GaleriHome extends Component
{
    private $list_galeri;

    public function __construct(){
        $this->list_galeri = GambarKegiatan::paginate(10);
    }

    public function render(){
        return view('components.galeri-home', [
            'list_galeri'   => $this->list_galeri
        ]);
    }
}
