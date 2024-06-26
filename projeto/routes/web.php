<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Cesar Routes
Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'create']);
