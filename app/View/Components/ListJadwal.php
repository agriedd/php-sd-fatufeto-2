<?php

namespace App\View\Components;

use App\Jadwal;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ListJadwal extends Component{
    private $jadwal;
    public function __construct(){
        $waktu = DB::table('tbl_jadwal')
            ->select(
                /**
                 * select all column waktu_mulai without duplicates
                 * 
                 */
                DB::raw('DISTINCT waktu_mulai')
            )
            ->get();
        $jadwal = Jadwal::rightJoin('tbl_kelas', 'tbl_jadwal.id_kelas', '=', 'tbl_kelas.id_kelas')
            ->leftJoin(DB::raw('(Select DISTINCT waktu_mulai from tbl_jadwal) as tbl_waktu'), 'tbl_waktu.waktu_mulai', '=', 'tbl_jadwal.waktu_mulai')
            ->orderBy('tbl_jadwal.id_kelas', 'desc')
            ->orderBy('tbl_jadwal.waktu_mulai', 'asc')
            ->get();

        $jadwal = $jadwal->sortBy(function($jadwal){
            $kelas_a = $jadwal->kelas[0]->nama ?? 'M';
            $kelas_a = preg_replace('/^(kelas\s+)([^-]+)(.*)$/i', "$2", $kelas_a);
            return $this->romanToDecimal($kelas_a) - 1;
        });
        $this->jadwal = $jadwal->groupBy(['id_kelas', 'waktu_mulai']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.list-jadwal', [
            'items' => $this->jadwal,
        ]);
    }

    /**
     * function to convert roman to decimal
     * 
     */
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
