<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class KontakHome extends Component{
    private $kontak;

    public function __construct(){
        $this->kontak = Sekolah::first()->kontak ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.kontak-home', [
            'kontak' => $this->kontak
        ]);
    }
}
