<?php

use App\Guru;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GuruSeeder extends Seeder{
    public function run(){

        $json = json_decode(file_get_contents(storage_path().'/guru.json'), true);
        $data = [];

        // Guru::whereRaw("1")->delete();

        foreach ($json['guru'] as $key => $value) {
            $tempat_lahir = preg_replace( '/^(.*)(,.*)$/', "$1", $value['ttl']);
            $tanggal_lahir = preg_replace( '/^(.*,\s*)(.*)$/', "$2", $value['ttl']);
            $date = null;
            $item = [
                'nip' => $value['nip'],
                'nama' => $value['nama'],
                'jenis_kelamin' => 'l',
                'jabatan' => $value['jabatan'],
                'pendidikan_terakhir' => $value['pendidikan_terakhir'],
                'pendidikan_profesi' => $value['pendidikan_profesi'] ?? null,
                'tempat_lahir' => $tempat_lahir,
            ];
            try {
                /**
                 * parse date from format carbon
                 * 
                 */
                $date = Carbon::createFromFormat('d-m-Y', $tanggal_lahir);
                $item['tanggal_lahir'] = $date->toDateString();
            } catch (\Throwable $th) {
                //throw $th;
            }
            if(Guru::where('nama', $value['nama'])->count() == 0){
                $data[] = $item;
            }
        }

        DB::table('tbl_guru')->insert($data);

    }
}
