<?php

use App\Guru;
use App\Kelas;
use Illuminate\Database\Seeder;

class WalikelasSeeder extends Seeder
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
            $kelasString = $kelasDecimal . "-" . $kelasName;
            $kelas[$siswa['kelas']] = $kelasString;
        }

        $list_guru = Guru::all();
        $kelas_string = [];
        foreach ($list_guru as $guru){
            /**
             * jika jabatan guru mengandung guru kelas
             * 
             */
            if(strpos($guru->jabatan, "Guru Kelas") !== false){
                $str = preg_replace('/^(guru\skelas\s*)([^\s]+)(\s*)([a-b]+)(.*)$/i', '$2-$4', $guru->jabatan);
                $kelasSplit = explode("-", $str);
                $kelasDecimal = $this->romanToDecimal($kelasSplit[0]);
                $kelasGuru = Kelas::where('nama', "Kelas " . $kelasDecimal . "-" . strtolower($kelasSplit[1]))->first();
                if($kelasGuru){
                    $kelasGuru->id_guru = $guru->id_guru;
                    $kelasGuru->save();
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

    public function romanToDecimal($roman){
        $roman = strtolower($roman);
        switch($roman){
            case "i":
                return 1;
                break;
            case "ii":
                return 2;
                break;
            case "iii":
                return 3;
                break;
            case "iv":
                return 4;
                break;
            case "v":
                return 5;
                break;
            case "vi":
                return 6;
                break;
        }
    }
}
