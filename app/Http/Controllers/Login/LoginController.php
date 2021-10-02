<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAccountRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    const ALL_GUARD = ['admin'];

    public function guard()
    {
        return Auth::guard('admin');
    }
    //Login form
    public function login(LoginAccountRequest $request)
    {
        $data = $request->validated();

        foreach (self::ALL_GUARD as $guard) {
            if(Auth::guard($guard)->attempt($data)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
        }
        return back();
    }
}
