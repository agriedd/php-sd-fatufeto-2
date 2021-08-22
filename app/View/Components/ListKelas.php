<?php

namespace App\View\Components;

use App\Kelas;
use Illuminate\View\Component;

class ListKelas extends Component{

    private $kelas;
    public function __construct(){
        $this->kelas = Kelas::withCount('siswa')->get();
    }

    public function render(){
        return view('components.list-kelas', [
            'list_kelas' => $this->kelas
        ]);
    }
}
