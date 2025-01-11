<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function authCheck($credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AppName')->plainTextToken;
            return [
                'status' => 'success',
                'user' => $user,
                'token' => $token,
            ];
        }
        return [
            'status' => 'error',
            'message' => 'Invalid credentials',
        ];
    }

}
