<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function attempt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=> ['required','email'],
            'password'=> ['required'],
        ]);

        $validated = $validator->validated();

        return (new AuthService)->attempt($validated);
    }
}
