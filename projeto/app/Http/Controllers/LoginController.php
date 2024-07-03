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
            $user = Auth::user();
            $request->session()->put('loginId', $user->id);
            session('loginId');

            return redirect('/home');
        } else {
            return redirect()->back()->withErrors(['invalidCredentials' => 'Email e/ou senha inválida.']);
        }
    }
}

