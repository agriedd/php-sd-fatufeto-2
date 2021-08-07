<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestJadwalUpdate extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'mata_pelajaran'        => 'required',
            'id_kelas'              => 'required|exists:tbl_kelas,id_kelas',
            'hari'                  => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
            'waktu_mulai'           => 'required',
            'waktu_berakhir'        => 'required',
        ];
    }
}
