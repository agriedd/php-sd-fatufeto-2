<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSekolahStore extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nama_sekolah'  => 'required',
            'jenjang'       => 'required',
            'tgl_berdiri'   => 'required',
            'struktur_organisasi'   => 'required|file|image',
            'visi_misi'     => 'required',
            'alamat'        => 'required',
            'npsn'          => 'required|unique:tbl_sekolah',
        ];
    }
}
