<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authorization(Request $request){
        if(Auth::guard('api')->check())
            return new AdminCollection(Auth::guard('api')->user());
        return response([
            "data"      => null,
            "message"   => "Masalah autentikasi"
        ]);
    }
}
