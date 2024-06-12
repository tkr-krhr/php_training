<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AccountController::class, 'index']);
Route::post('login', [AccountController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('home', [AccountController::class, 'home']);
 });

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
