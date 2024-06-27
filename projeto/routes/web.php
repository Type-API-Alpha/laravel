<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Cesar Routes
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'create'])->name('create.user');
Route::get('/event_user', [EventController::class, 'showEvents'])->name('user.events');
Route::get('/create_event', [EventController::class, 'create'])->name('create.event');

















Route::view('/login', 'login') ->name('login');
Route::post('/auth', [ LoginController::class, 'auth' ]) ->name('login.auth');
