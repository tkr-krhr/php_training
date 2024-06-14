<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function showChangeForm()
    {
        return view('password_change');
    }

    public function change(Request $request)
    {
        // $request->validate([
        //     'current_password' => 'required',
        //     'password' => 'required|min:8|confirmed',
        // ]);

        $account = Auth::user();
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');

        if (!Hash::driver('pbkdf2_mcf')->check($currentPassword, $account->password)) {
            return back()->with('error', '現在のパスワードが間違っています。');
        }

        $hashedPassword =  Hash::driver('pbkdf2_mcf')->make($newPassword);
        $account->password = $hashedPassword;
        $account->save();

        return redirect()->route('password.change')->with('success', 'パスワードを変更しました。');
    }
}
