<?php

namespace App\View\Components;

use App\Guru;
use Illuminate\View\Component;

class ListGuru extends Component
{
    private $list_guru;

    public function __construct(){
        $this->list_guru = Guru::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(){
        return view('components.list-guru', [
            'list_guru' => $this->list_guru
        ]);
    }
}
