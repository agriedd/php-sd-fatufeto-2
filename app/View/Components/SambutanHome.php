<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class SambutanHome extends Component{

    private $sambutan;
    public function __construct(){
        $this->sambutan = Sekolah::first()->sambutan ?? "";
    }

    public function render(){
        return view('components.sambutan-home', [
            'sambutan' => $this->sambutan
        ]);
    }
}
