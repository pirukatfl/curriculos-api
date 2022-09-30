<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request) {
        try {
            $credentials = request(['email', 'password']);

            $token = auth()->attempt($credentials);
            if (!$token) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token);
        } catch (\Throwable $th) {
            return response()->json([
                'error'=> $th
            ], 500);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            // 'user'=> auth()->user()
        ]);
    }
}

