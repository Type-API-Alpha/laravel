<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
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
            return redirect()->back()->withErrors(['login' => 'Email e/ou senha inválida.']);
        }
    }
}

