<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ EventController::class, 'index' ]) ->name('home.index');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'create'])->name('create.user');
Route::get('/event_user', [EventController::class, 'showEvents'])->name('user.events');
Route::get('/create_event', [EventController::class, 'create'])->name('form.create.event');
Route::post('/create_event', [EventController::class, 'store'])->name('create.event');
Route::get('/edit_event/{event}', [EventController::class, 'edit'])->name('form.edit.event');
Route::put('/edit_event/{event}', [EventController::class, 'update'])->name('edit.event');
Route::delete('/event_user/{event}', [EventController::class, 'leaveEvent'])->name('leave.event');
Route::delete('/event/{event}', [EventController::class, 'destroy'])->name('delete.event');

Route::get('/event/{event}/participants', [EventController::class, 'getParticipants'])->name('event.participants');
Route::delete('/event/{event}/participants/{user}', [EventController::class, 'removeParticipant'])->name('event.removeParticipant');

Route::view('/login', 'login') ->name('login');
Route::post('/auth', [ LoginController::class, 'auth' ]) ->name('login.auth');
Route::get('/home', [ EventController::class, 'index' ]) ->name('event.index');
Route::get('/event/{event}', [ EventController::class, 'show' ]) ->name('event.detail');
Route::post('join/event/{event}', [ UserEventController::class, 'store' ]) ->name('event.join')->middleware('auth');
Route::post('/event/{id}/photo', [ EventController::class, 'addGaleryPhoto' ]) ->name('event.addPhoto');
