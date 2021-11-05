<?php

namespace App\Http\Controllers\AuthGuru;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    protected function guard(){
        return Auth::guard('guru');
    }

    
    public function username()
    {
        return 'nip';
    }

    protected function authenticated(Request $request, $user){
        $token = $user->createToken('authToken')->accessToken;
        return new Response([
            'data'  => $user,
            'token' => $token
        ]);
    }
}
