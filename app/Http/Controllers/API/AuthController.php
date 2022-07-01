<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        if (Auth::attempt($request->only('email','password'))) {
            $token = $request->user()->createToken($request->token_name);
            return ['token' => $token->plainTextToken];
        }


    }
}
