<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestGuruStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama'  => 'required',
            'nip'   => 'unique:tbl_guru',
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
            'email'   => 'required|unique:tbl_guru,email',
            'password'   => 'required',
        ];
    }
}
