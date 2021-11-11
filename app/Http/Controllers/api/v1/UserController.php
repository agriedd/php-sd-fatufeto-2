<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminCollection;
use App\Http\Resources\GuruCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authorization(Request $request){
        if(Auth::guard('api')->check())
            return new AdminCollection(Auth::guard('api')->user());
        if(Auth::guard('api_pimpinan')->check())
            return new GuruCollection(Auth::guard('api_pimpinan')->user());
        if(Auth::guard('api_guru')->check())
            return new GuruCollection(Auth::guard('api_guru')->user());
        return response([
            "data"      => null,
            "message"   => "Masalah autentikasi"
        ]);
    }
}
