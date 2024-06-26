<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});





















Route::view('/login', 'login') ->name('login');
Route::post('/auth', [ LoginController::class, 'auth' ]) ->name('login.auth');