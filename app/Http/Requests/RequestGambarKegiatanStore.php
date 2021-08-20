<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestGambarKegiatanStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'foto'  => 'required|mimes:jpeg,bmp,png,jpg,gif|max:2048',
        ];
    }
}
