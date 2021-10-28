<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSiswaStore extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama_siswa' => 'required',
            'nis' => 'nullable|unique:tbl_siswa,nis',
            'nisn' => 'nullable|unique:tbl_siswa,nisn',
            'alamat' => 'nullable',
            'agama' => 'nullable|in:0,1,2,3,4,5',
            'jenis_kelamin' => 'in:l,p',
            // 'tempat_lahir'   => 'nullable',
            // 'tanggal_lahir'   => 'nullable',
            'kip' => 'nullable|unique:tbl_siswa,kip',
            'id_kelas'              => 'required|exists:tbl_kelas,id_kelas',
        ];
    }
}
