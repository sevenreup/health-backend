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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string'
        ]);

        $user = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        error_log($request->first_name);
        error_log($user);
        $user->save();
        return response()->json([ 'status' => true, 'message' => 'User created'], 201);
    }

    public function login(Request $request) {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);
        $credintials = request(['phone', 'password']);
        if(!Auth::attempt($credintials)) {
            return response()->json(['status' => true,'message' => 'Unauthorized'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json([
            'id' => $user->id,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'name' => $user->first_name." ".$user->last_name,
            'phone' => $user->phone
        ]);

    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();

        return response()->json(['status' => true,'message' => 'Logged out']);
    }

    public function username()
    {
        return 'phone';
    }
}
