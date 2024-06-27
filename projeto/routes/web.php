<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Cesar Routes
Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'create']);



















Route::view('/login', 'login') ->name('login');
Route::post('/auth', [ LoginController::class, 'auth' ]) ->name('login.auth');
Route::get('/home', [ EventController::class, 'index' ]) ->name('event.index');
Route::get('/event/{event}', [ EventController::class, 'show' ]) ->name('event.detail');