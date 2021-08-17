<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPrasaranaStore extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama'          => 'required|unique:tbl_prasarana,nama',
            'kondisi'   => 'nullable',
            'id_sekolah'    => 'exists:tbl_sekolah,id_profil',
            'jumlah'        => 'numeric'
        ];
    }
}
