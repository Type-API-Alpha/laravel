<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function auth(Request $request): RedirectResponse {
        $credentials = $request-> validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'min:8'],
        ], [
            'email.email' => 'Email inválido',
            'email.required' => 'Email é obrigatório.',
            'password.required' => 'Senha é obrigatório.',
            'password.min' => 'Senha tem que possuir no mínimo 8 caracteres.',
        ]);

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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('event.index');
    }
}

