<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestGuruUpdate extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules()
    {
        $id = request()->route('guru');
        return [
            'nama'  => 'required',
            'nip'   => [
                'nullable',
                Rule::unique('tbl_guru', 'nip')->ignore($id, 'id_guru')
            ],
            'jenis_kelamin' => 'in:l,p',
            'jabatan'   => 'nullable',
            // 'pangkat'   => 'nullable',
            // 'golongan'   => 'nullable',
            'pendidikan_terakhir'   => 'nullable',
            'pendidikan_profesi'   => 'nullable',
            'tempat_lahir'   => 'nullable',
            'tanggal_lahir'   => 'nullable',
            'telepon'   => 'nullable',
            'alamat'   => 'nullable',
            'foto'   => 'nullable|image|max:2048',
            'email'   => [
                'required',
                Rule::unique('tbl_guru', 'email')->ignore($id, 'id_guru')
            ],
        ];
    }
}
