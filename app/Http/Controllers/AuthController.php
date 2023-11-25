<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json(["token"=> $token]);
    }

    public function auth(Request $request)
    {
        $request->validate([
            'device_name' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages(
                ['email' => ["Falha de autenticação"]]
            );
        }

        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json(["token"=> $token]);
    } 
 
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        response()->json([
            "message" => "Sessão encerrada"
        ]);
    }    
}