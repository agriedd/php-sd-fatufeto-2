<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestSiswaUpdate extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $id = $this->route('siswa');
        return [
            'nama_siswa' => 'required',
            'nis' => [
                "nullable",
                Rule::unique('tbl_siswa', 'nis')->ignore($id, 'id'),
            ],
            'nisn' => [
                "nullable",
                Rule::unique('tbl_siswa', 'nisn')->ignore($id, 'id'),
            ],
            'alamat' => 'nullable',
            'agama' => 'nullable|in:0,1,2,3,4,5',
            'jenis_kelamin' => 'in:l,p',
            // 'tempat_lahir'   => 'nullable',
            // 'tanggal_lahir'   => 'nullable',
            'kip' => [
                "nullable",
                Rule::unique('tbl_siswa', 'kip')->ignore($id, 'id'),
            ],
            'id_kelas'              => 'required|exists:tbl_kelas,id_kelas',
        ];
    }
}
