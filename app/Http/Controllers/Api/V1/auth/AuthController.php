<?php

namespace App\Http\Controllers\Api\V1\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('authToken', ['alerts'])->plainTextToken;
            return response()->json([
                'message' => 'Authenticated',
                'token' => $token
            ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function changeToken(Request $request) {

        $credentials = $request->only('email', 'password');

        if (auth('web')->attempt($credentials) && auth()->user()->role === 'admin') {

            $token = auth()->user()->createToken('authToken', [$request->token])->plainTextToken;

            return response()->json([
                'message' => 'Token changed',
                'token' => $token
            ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

}
