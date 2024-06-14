<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PasswordChangeController;
use App\Http\Controllers\DeleteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AccountController::class, 'index']);
Route::post('login', [AccountController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('home', [AccountController::class, 'home'])->name('home');
    Route::post('/logout', [AccountController::class, 'logout'])->name('logout');

    Route::get('/password/change', [PasswordChangeController::class, 'showChangeForm'])->name('password.change');
    Route::post('/password/change', [PasswordChangeController::class, 'change'])->name('password.change.submit');

    Route::get('/destroy', [DeleteController::class, 'destroyForm'])->name('account.destroy');
    Route::delete('/destroy', [DeleteController::class, 'destroy'])->name('destroy');      
 });

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/search', [SearchController::class, 'showSearchForm'])->name('search.form');
Route::post('/search', [SearchController::class, 'searchByEmail'])->name('search.byEmail');
