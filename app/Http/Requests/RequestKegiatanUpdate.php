<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestKegiatanUpdate extends FormRequest
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
            'nama_kegiatan' => 'required',
            'tanggal'       => 'required|date',
            'waktu'         => 'required',
            'lokasi'        => 'required',
            'hari'          => 'nullable|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
        ];
    }
}
