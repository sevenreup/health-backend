<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'phone' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        return response()->json([ 'message' => 'User created'], 201);
    }

    private function login(Request $request) {
        $request->validate([
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $credintials = request(['email', 'password']);
        if(!Auth::attempt($credintials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);

    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Logged out']);
    }

    public function username()
    {
        return 'phone';
    }
}
