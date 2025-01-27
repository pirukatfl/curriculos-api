<?php

namespace App\Services;

use App\Models\User;
use App\Services\Strategy\JwtStrategy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function attempt(array $credentials)
    {
        $user = User::where('email', $credentials['email'])->first();

        if(!$user) {
            return $this->response('User does not exists', 422);
        }

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'token' => (new JwtService(JwtStrategy::class))->createToken($token)
        ]);
    }
}
