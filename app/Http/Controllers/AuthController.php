<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $credentials = Validator::make($request->all(), [
            'phone_number' => 'required',
            'password' => 'required'
        ]);

        if ($credentials->fails()) {
            return response()->json([
                'status' => 400,
                'info' => 'Validation failed',
                'data' => $credentials->errors() 
            ], 200);
        }

        if (Auth::attempt(['phone_number' => $request->phone_number, 'password' => $request->password, 'role' => 'User'])) {
            $token = $request->user()->createToken('Auth Token')->plainTextToken;
            return response()->json([
                'status' => 200,
                'info' => 'Login success',
                'token' => $token
            ], 200);
        }

        return response()->json([
            'status' => 400,
            'info' => 'Login failed',
            'data' => 'Email atau password salah'
        ], 400);
    }

    public function logout(Request $request) 
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 200,
            'info' => 'Logout success'
        ], 200);
    }
}
