<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
        ]);

        $user=User::where('email', $fields['email'])->first();

        if(!$user ){
            return \response([
                'message'=>'Credenziali errate'
            ],401);
        }

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return \response($response,201);
    }

    public function logout (Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged Out'
        ];
    }

}
