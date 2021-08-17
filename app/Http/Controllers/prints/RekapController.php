<?php

namespace App\Http\Controllers\prints;

use App\Guru;
use App\Http\Controllers\Controller;
use App\Kelas;
use Illuminate\Http\Request;

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
}
