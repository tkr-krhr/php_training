<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function create(array $data)
    {
    return Account::create([
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    }

    // protected function validator(array $data)
    // {
    // return Validator::make($data, [
    //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     'password' => ['required', 'string', 'min:8', 'confirmed'],
    // ]);
    // }

    public function register(Request $request)
    {
        // $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Optional: log the user in
        // auth()->login($user);
        auth()->login($user);
        \Log::info('User registered and redirected to home.');
        // \Log::info('User authenticated: ' . (Auth::check() ? 'Yes' : 'No'));
        return redirect()->route('home'); // Redirect to home or wherever you want
    }
}
