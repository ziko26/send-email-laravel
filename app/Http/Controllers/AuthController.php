<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',  
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    
    public function login(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required:min:8'
        ]);

        if($validator->faild()){
            return reponse()->json([
                'error' => true,
                'message' => $validator->errors()
            ], 201);
        }

        $credentials = request(['email', 'password']);
        $token = auth('api')->attempt($credentials);
        if(!$token){
            return reponse()->json([
                'error' => true,
                'message' => 'You are unauthorized'
            ], 401);
        }

        return response()->json([
            'access_token' => $token,
            'expire_in' => auth('api')->factory()->getTTL() * 3600
        ]);
    }

    public function logout(Request $request) {
        auth('api')->user()->logout();

        return [
            'message' => 'Logged out'
        ];
    }
}
