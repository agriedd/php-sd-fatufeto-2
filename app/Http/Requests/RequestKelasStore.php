<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestKelasStore extends FormRequest{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'nama'          => 'required|unique:tbl_kelas,nama',
            'keterangan'    => 'nullable',
            'id_guru'       => 'nullable|exists:tbl_guru,id_guru',
            'id_prasarana'  => 'nullable|exists:tbl_prasarana,id_prasarana',
        ];
    }
}
