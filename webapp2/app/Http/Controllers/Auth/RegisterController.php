<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Optional: log the user in
        // auth()->login($user);

        return redirect()->route('home'); // Redirect to home or wherever you want
    }
    protected function create(array $data)
    {
    return User::create([
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    }

    protected function validator(array $data)
    {
    return Validator::make($data, [
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    }
}
