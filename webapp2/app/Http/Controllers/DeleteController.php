<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DeleteController extends Controller
{
    public function destroyForm()
    {
        return view('delete');
    }

    public function destroy(Request $request)
    {
        // ログイン中のユーザーを取得
        $account = Auth::user();

        // パスワードが正しいか確認
        if (Hash::driver('pbkdf2_mcf')->check($request->password, $account->password)) {
            // パスワードが正しい場合はアカウントを削除する
            $account->delete();
            Auth::logout();
            return redirect('/login')->with('status', 'アカウントが削除されました。');
        }

        return redirect('/dstroy')->with('status', 'パスワードが違います。');
    }
}
