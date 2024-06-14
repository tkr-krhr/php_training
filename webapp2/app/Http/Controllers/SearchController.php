<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // 検索フォームを表示するメソッド
    public function showSearchForm()
    {
        return view('search');
    }

    // 検索ロジックを実行するメソッド
    public function searchByEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $account_id = DB::table('accounts')->where('email', $email)->first(['id']);

        return view('search', [
            'email' => $email,
            'user' => $account_id,
        ]);
    }
}
