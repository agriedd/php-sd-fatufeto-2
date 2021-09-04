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
        $this->jadwal = $jadwal->groupBy(['id_kelas', 'waktu_mulai']);
        // dd($this->jadwal);
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
}
