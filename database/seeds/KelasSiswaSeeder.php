<?php

use App\Jadwal;
use App\Kelas;
use App\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $json = json_decode(file_get_contents(storage_path().'/siswa.json'), true);

        $data = $json['siswa'];

        $kelas = [];
        foreach ($data as $siswa){
            $kelasDecimal = (int) preg_replace( '/[^0-9]/', '', $siswa['kelas'] );
            $kelasName = preg_replace( '/[0-9\s]/', '', $siswa['kelas'] );
            $kelasString = $this->decimalToRoman($kelasDecimal) . "-" . $kelasName;
            $kelas[$siswa['kelas']] = $kelasString;
        }

        
        DB::table('tbl_kelas')->whereRaw('1')->delete();
        
        foreach($kelas as $key => $value){
            if(!Kelas::where('nama', $value)->count()){
                Kelas::create([
                    'nama' => "Kelas $value"
                ]);
            }
        }
        $dataCollection = collect($data);
        $dataGrouping = $dataCollection->groupBy('kelas');

        /**
         * clear all data siswa
         * 
         */
        Siswa::truncate();
        
        foreach($dataGrouping as $kelas_key => $list_siswa){
            $kelasRoman = $kelas[$kelas_key];
            $kelasSiswa = Kelas::where('nama', "Kelas $kelasRoman")->first();
            foreach($list_siswa as $siswa){
                if(!Siswa::where('nama_siswa', $siswa['nama_siswa'])->count()){
                    Siswa::create([
                        'nama_siswa'    => $siswa['nama_siswa'],
                        'jenis_kelamin'    => $siswa['jenis_kelamin'],
                        'agama'    => '1',
                        'id_kelas'  => $kelasSiswa->id_kelas,
                        'alamat'    => $siswa['alamat'],
                        'nisn'      => $siswa['nisn'] ?? null
                    ]);
                }
            }
        }
    }

    /**
     * convert decimal to roman
     * 
     */
    public function decimalToRoman($num) {
        $romans = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        ];
        $roman = '';
        foreach ($romans as $romanLetter => $number) {
            while ($num >= $number) {
                $roman .= $romanLetter;
                $num -= $number;
            }
        }
        return $roman;
    }
}
