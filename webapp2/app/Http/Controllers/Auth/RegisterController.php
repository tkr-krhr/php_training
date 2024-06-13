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
    // protected function validator(array $data)
    // {
    // return Validator::make($data, [
    //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     'password' => ['required', 'string', 'min:8', 'confirmed'],
    // ]);
    // }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function create(array $data)
    {
        $hashedPassword = Hash::driver('pbkdf2_mcf')->make($data['password']); // MCF形式でハッシュ化

        return Account::create([
            'email' => $data['email'],
            'password' => $hashedPassword,
        ]);
    }

    public function register(Request $request)
    {
        $account = $this->create($request->all());
        Auth::login($account);
        return redirect()->intended('/home');
    }
}
