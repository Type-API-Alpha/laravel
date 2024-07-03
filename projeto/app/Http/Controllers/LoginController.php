<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    
    public function auth(AuthLoginRequest $request): RedirectResponse {

        $credentials = [
            'email' => $request ->email,
            'password' => $request ->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home');
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors(['invalidCredentials' => 'Email e/ou senha inválida.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('event.index');
    }
}

