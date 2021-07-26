<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSaranaStore extends FormRequest
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
            'nama'          => 'required|unique:tbl_prasarana,nama',
            'kondisi'       => 'nullable',
            'id_prasarana'  => 'exists:tbl_prasarana,id_prasarana',
            'jumlah'        => 'numeric'
        ];
    }
}
