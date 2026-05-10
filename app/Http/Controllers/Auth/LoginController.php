<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        if (
            !Auth::attempt([
                'phone' => $request->phone,
                'password' => $request->password,
            ])
        ) {
            return back()->withErrors(['auth' => 'Неверный телефон или пароль']);
        }

        return redirect()->route('home');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return back();
    }
}
