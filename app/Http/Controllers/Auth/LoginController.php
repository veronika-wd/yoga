<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        Auth::attempt($request->only('phone', 'password'));
        if (Auth::check()) {
            return redirect()->route('home');
        } else{
            return redirect()->back()->withErrors([
                'auth' => 'Неверный телефон или пароль',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->back();
    }
}
