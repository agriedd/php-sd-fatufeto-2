<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPimpinanStore extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules()
    {
        return [
            'nama'  => 'required',
            'nip'   => 'unique:tbl_pimpinan',
            'jenis_kelamin' => 'in:l,p',
            'jabatan'   => 'nullable',
            'pangkat'   => 'nullable',
            'golongan'   => 'nullable',
            'pendidikan_terakhir'   => 'nullable',
            'pendidikan_profesi'   => 'nullable',
            'tempat_lahir'   => 'nullable',
            'tanggal_lahir'   => 'nullable',
            'telepon'   => 'nullable',
            'alamat'   => 'nullable',
        ];
    }
}
