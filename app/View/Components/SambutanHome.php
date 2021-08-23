<?php

namespace App\View\Components;

use App\Sekolah;
use Illuminate\View\Component;

class SambutanHome extends Component{

    private $sambutan;
    public function __construct(){
        $this->sambutan = Sekolah::first()->sambutan ?? "";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(){
        return view('components.sambutan-home', [
            'sambutan' => $this->sambutan
        ]);
    }
}
