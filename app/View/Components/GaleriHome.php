<?php

namespace App\View\Components;

use App\GambarKegiatan;
use App\Kegiatan;
use Illuminate\View\Component;

class GaleriHome extends Component
{
    private $list_galeri;
    private $kegiatan;

    public function __construct(){
        $this->kegiatan = Kegiatan::find(request('id_kegiatan'));
        $this->list_galeri = GambarKegiatan::latest()
            ->when(request('id_kegiatan'), function ($query, $kegiatan) {
                return $query->where('id_kegiatan', $kegiatan);
            })
            ->paginate(10);
    }

    public function render(){
        return view('components.galeri-home', [
            'list_galeri'   => $this->list_galeri,
            'kegiatan'      => $this->kegiatan
        ]);
    }
}
