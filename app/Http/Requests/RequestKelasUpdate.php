<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestKelasUpdate extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama'          => [
                'required', Rule::unique('tbl_kelas', 'nama')->ignore($this->route('kela'), 'id_kelas')
            ],
            'keterangan'    => 'nullable',
            'id_guru'       => 'nullable|exists:tbl_guru,id_guru',
        ];
    }
}
