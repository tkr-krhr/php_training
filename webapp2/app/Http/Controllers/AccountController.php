<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('account-login');
    }
    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $account = Account::where('email', $credentials['email'])->first();

        if ($account && Hash::driver('pbkdf2_mcf')->check($credentials['password'], $account->password)) { // MCF形式のハッシュを検証
            Auth::login($account);
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->withErrors(['email' => 'ログインに失敗しました。']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login'); 
    }

    public function home()
    {
        return view('home');
    }
}

