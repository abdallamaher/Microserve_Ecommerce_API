<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\image;
use App\Models\User;


class RegisterController extends Controller
{

    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->all());
        Image::create([
            'url' => 'default.jpg',
            'imageable_type' => User::class,
            'imageable_id' =>  $user->id,
        ]);

        $user->assignRole('user');

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'user'  =>  $user->only(['id', 'name', 'email']),
        ]);
    }

}
