<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Http\Request;

class AuthController extends Controller {
    public function login(Request $request): \Illuminate\Http\JsonResponse {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return response()->json(["msg" => "login success"], 201);
    }
    public function logout(Request $request): \Illuminate\Http\JsonResponse {
        $this->validate($request, [
            'token' => 'required'
        ]);

        return response()->json(["msg" => "logout"], 201);
    }
}
