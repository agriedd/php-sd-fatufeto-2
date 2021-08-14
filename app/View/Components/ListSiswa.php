<?php

namespace App\View\Components;

use App\Siswa;
use Illuminate\View\Component;

class ListSiswa extends Component
{
    private $list_siswa;
    public function __construct(){
        $this->list_siswa = Siswa::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(){
        return view('components.list-siswa', ['list_siswa' => $this->list_siswa]);
    }
}
