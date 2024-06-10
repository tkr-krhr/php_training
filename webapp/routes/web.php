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