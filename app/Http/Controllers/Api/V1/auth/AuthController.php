<?php

namespace App\Http\Controllers\Api\V1\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginapi(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('authToken', ['alerts'])->plainTextToken;

            return response()->json([
                'message' => 'Authenticated',
                'token' => $token,
            ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function changeToken(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (auth('web')->attempt($credentials) && auth()->user()->role === 'admin') {

            $token = auth()->user()->createToken('authToken', [$request->token])->plainTextToken;

            return response()->json([
                'message' => 'Token changed',
                'token' => $token,
            ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function changeTokens(Request $request)
    {

        $credentials = $request->only('my_email', 'my_password');
        $userEmail = $request->input('email');
        $newToken = $request->input('token');

        if (auth('web')->attempt(['email' => $credentials['my_email'], 'password' => $credentials['my_password']]) && auth()->user()->role === 'admin') {

            $user = User::where('email', $userEmail)->first();

            if ($user) {
                $token = $user->createToken('authToken', [$newToken])->plainTextToken;

                return response()->json([
                    'message' => 'Token changed',
                    'token' => $token,
                ], 200);
            }

            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
