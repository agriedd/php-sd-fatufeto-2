<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class AlamatHome extends Component
{

    private $alamat;
    public function __construct(){
        $this->alamat = optional(Sekolah::first())->alamat;
    }

    public function render(){
        return view('components.alamat-home', [
            'alamat' => $this->alamat,
        ]);
    }
}