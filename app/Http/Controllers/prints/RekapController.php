<?php

namespace App\Http\Controllers\prints;

use App\Guru;
use App\Http\Controllers\Controller;
use App\Jadwal;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller{
    public function siswa(){

        $kelas = Kelas::withCount([
            'siswa', 'siswa_laki_laki', 'siswa_perempuan'
        ])->orderBy('nama', "ASC")->get();
        
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('rekap/siswa', [
            'kelas_list' => $kelas
        ])->render());
        return $mpdf->Output('Rekap Siswa.pdf', 'I');
    }
    public function guru(){

        $guru_perempuan = Guru::where('jenis_kelamin', 'p')->count();
        $guru_laki_laki = Guru::where('jenis_kelamin', 'l')->count();
        $guru = Guru::count();
        
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('rekap/guru', [
            'guru_perempuan' => $guru_perempuan,
            'guru_laki_laki' => $guru_laki_laki,
            'guru' => $guru
        ])->render());
        return $mpdf->Output('Rekap Guru.pdf', 'I');
    }
    public function jadwal(){
        $mpdf = new \Mpdf\Mpdf();
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
        $jadwal = $jadwal->groupBy(['id_kelas', 'waktu_mulai']);
        $mpdf->WriteHTML(view('rekap/jadwal', [
            'items' => $jadwal
        ])->render());
        return $mpdf->Output('Jadwal.pdf', 'I');
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
