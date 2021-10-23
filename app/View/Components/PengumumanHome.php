<?php

namespace App\View\Components;

use App\Berita;
use Illuminate\View\Component;

class PengumumanHome extends Component
{
    private $list_pengumuman;

    public function __construct(){
        $this->list_pengumuman = Berita::whereHas('kategori', function($query){
            $query->where('nama_kategori', 'pengumuman');
        })->whereRaw("expired_at >= NOW()")->orderBy('tanggal_terbit', 'desc')->limit(5)->get();
    }

    public function render(){
        return view('components.pengumuman-home', [
            'list_pengumuman' => $this->list_pengumuman
        ]);
    }
}
