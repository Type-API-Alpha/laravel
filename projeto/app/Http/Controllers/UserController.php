<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller {

    public function create() {
        return view('register');
    }

    public function store(StoreUserRequest $request): RedirectResponse{
        User::create([
            'name' => $request ->name,
            'email' => $request ->email,
            'password' => $request ->password,
        ]);

        return redirect()->route('login')->with('storageSuccess', 'Cadastro realizado com sucesso!');
    }
}
