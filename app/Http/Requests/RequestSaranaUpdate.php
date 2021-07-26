<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestSaranaUpdate extends FormRequest
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
        $id = $this->route('sarana');
        return [
            'nama'          => [
                'required',
                Rule::unique('tbl_sarana', 'nama')->ignore($id, 'id_sarana')
            ],
            'kondisi'   => 'nullable',
            'id_prasarana'    => 'exists:tbl_prasarana,id_prasarana',
            'jumlah'        => 'numeric'
        ];
    }
}
