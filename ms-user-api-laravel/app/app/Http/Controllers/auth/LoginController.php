<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return response(['message' => 'Invalid credentials']);
        }

        $user = Auth::user();
        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'user'  =>  $user->load(['roles', 'image']),
        ]);
    }
}
