<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller {

    public function login(Request $request) {
        $credentials = $request->all();
        $credentials['password'] = Hash::make($credentials['password']);
        dd($credentials);
    }
}
