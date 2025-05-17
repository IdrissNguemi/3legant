<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login (Request $request){
        $loginUserData = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|min:8'
        ]);

        $user = User::where('email',$loginUserData['email'])->first();
        if(!$user || !Hash::check($loginUserData['password'],$user->password)){
            return response()->json([
                'message' => 'Incorrect password or email address'
            ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }

public function loginAdmin(Request $request)
    {
        // Logique d'authentification pour l'admin
        $adminCredentials = [
            'admin' => 'admin',
            'password' => '3legant#2025'
        ];

        $adminUserData = $request->validate([
            'admin' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($adminUserData['admin'] === $adminCredentials['admin'] && $adminUserData['password'] === $adminCredentials['password']) {
            // Génére un token ou une session pour l'admin
            $token = 'admin-auth-token';
            return response()->json([
                'message' => 'Admin authenticated successfully',
                'access_token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Incorrect admin credentials'
        ],401);
    }

}
