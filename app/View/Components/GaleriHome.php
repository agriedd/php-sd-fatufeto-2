<?php

namespace App\View\Components;

use App\GambarKegiatan;
use App\Kegiatan;
use Illuminate\View\Component;

class GaleriHome extends Component
{
    private $list_galeri;
    private $kegiatan;
    private $hideGaleri;
    private $max;

    public function __construct($idKegiatan = null, $hideGaleri = false, $max = 10){
        $this->hideGaleri = $hideGaleri;
        $this->max = $max;
        $this->kegiatan = Kegiatan::find($idKegiatan ?? request('id_kegiatan'));
        $this->list_galeri = GambarKegiatan::latest()
            ->when($idKegiatan ?? request('id_kegiatan'), function ($query, $kegiatan) {
                return $query->where('id_kegiatan', $kegiatan);
            })
            ->paginate($max);
    }

    public function render(){
        return view('components.galeri-home', [
            'list_galeri'   => $this->list_galeri,
            'kegiatan'      => $this->kegiatan,
            'hideGaleri'    => $this->hideGaleri,
            'max'           => $this->max
        ]);
    }
}
