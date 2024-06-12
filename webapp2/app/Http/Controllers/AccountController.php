<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('account-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['account_id', 'password']);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back();
    }

    public function home()
    {
        return view('home');
    }
}

