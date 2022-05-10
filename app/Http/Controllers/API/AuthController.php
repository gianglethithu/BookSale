<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        $token = $user->createToken('funToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' =>$token
        ];
        return response($response, 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=> 'logout successed']);
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', ],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response(['message' => 'Invalid email or password'], 401);
        } else {
            $token = $user->createToken('funTokenLogin')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response($response, 200);
        }

    }
}
