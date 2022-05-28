<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register']]);
    }

    public function register(Request $request)
    {
        try {
            $user = $request->all();
            $user['password'] = Hash::make($user['password']);
            // return $user;
            $data = User::updateOrCreate($user);
            return response()->json([
                'data'=> $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'msg'=> $th
            ], 500);
        }
    }
}
