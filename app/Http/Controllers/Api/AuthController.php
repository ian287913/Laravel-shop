<?php

namespace App\Http\Controllers\Api;

//use Illuminate\Contracts\Auth\UserProvider;
//use Tymon\JWTAuth\Providers\Auth\Illuminate;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6',
                'password_confirmation' => 'required|string|same:password',
            ]
        );
        //User::
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'level' => $request->input('level'),
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function login(Request $request)
    {
        // $myuser
        $this->validate(
            $request,
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:6',
            ]
        );

        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Username or password '], 401);
        }
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user()
        ]);
        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function sendUpdate(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        route('password.email');
        $user->update(['name' => 'asdasdasdasdasd']);
        $user->update(['password' => 'asdasdasdasdasd']);
        $user = User::where('email', $request->input('email'))->first();
        return response()->json([
            'success' => true,
            'user' => $user,
        ]);
        return response()->json(['message' => 'Successfully updated']);
    }
}
