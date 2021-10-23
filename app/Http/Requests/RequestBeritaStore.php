<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBeritaStore extends FormRequest
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
        return [
            'judul'   => 'required',
            'isi'   => 'required',
            'deskripsi'   => 'required',
            'expired_at'   => 'nullable',
            'terbit'   => 'in:0,1',
            'id_kategori'   => 'required|exists:tbl_kategori,id_kategori',
        ];
    }
}
