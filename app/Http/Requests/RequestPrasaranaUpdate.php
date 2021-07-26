<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestPrasaranaUpdate extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $id = $this->route('prasarana');
        return [
            'nama'          => [
                'required',
                Rule::unique('tbl_prasarana', 'nama')->ignore($id, 'id_prasarana')
            ],
            'spesifikasi'   => 'nullable',
            'id_sekolah'    => 'exists:tbl_sekolah,id_profil',
            'jumlah'        => 'numeric'
        ];
    }
}
