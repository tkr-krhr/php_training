<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected function create(array $data)
    {
    return User::create([
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    }

}
