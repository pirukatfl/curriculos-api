<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LogoutController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['logout']]);
    }

    public function logout(Request $request) {
        try {
            auth()->logout();

            return response()->json(['message' => 'Deslogado com sucesso!', 200]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg'=> $th
            ], 500);
        }
    }

}
