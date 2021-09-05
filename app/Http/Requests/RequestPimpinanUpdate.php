<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestPimpinanUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('pimpinan');
        return [
            'nama'  => 'required',
            'nip'   => [
                'nullable',
                Rule::unique('tbl_pimpinan', 'nip')->ignore($id, 'id_pimpinan')
            ],
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
            'id_profil' => 'nullable,exists:tbl_pimpinan,id_profil',
            'foto'   => 'nullable|image|max:2048',
            'email'   => [
                'nullable',
                Rule::unique('tbl_pimpinan', 'email')->ignore($id, 'id_pimpinan')
            ],
        ];
    }
}
