<?php

namespace App\View\Components;

use App\Jadwal;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ListJadwal extends Component{
    private $jadwal;
    public function __construct(){
        $jadwal = Jadwal::rightJoin('tbl_kelas', 'tbl_jadwal.id_kelas', '=', 'tbl_kelas.id_kelas')
            ->leftJoin(DB::raw('
            (Select DISTINCT waktu_mulai from tbl_jadwal) as tbl_waktu'), 'tbl_waktu.waktu_mulai', '=', 'tbl_jadwal.waktu_mulai')
            ->orderBy('tbl_jadwal.id_kelas', 'desc')
            ->orderBy('tbl_jadwal.waktu_mulai', 'asc')
            ->get();
        $jadwal = $jadwal->sortBy(function($jadwal){
            $kelas_a = $jadwal->kelas[0]->nama ?? '100';
            $kelas_a = preg_replace('/[^0-9]/i', "", $kelas_a);
            return $kelas_a;
        });
        $this->jadwal = $jadwal->groupBy(['id_kelas', 'waktu_mulai']);
    }

    public function render()
    {
        return view('components.list-jadwal', [
            'items' => $this->jadwal,
        ]);
    }

    public function romanToDecimal($roman){
        $romans = array(
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000
        );
        $result = 0;
        for($i = 0; $i < strlen($roman); $i++){
            $result += $romans[$roman[$i]];
        }
        return $result;
    }
}
