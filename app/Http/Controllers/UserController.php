<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;

class UserController extends Controller {
    public function index(): \Illuminate\Http\JsonResponse {
        return response()->json(["msg" => "user list"]);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse {
        $this->validate($request, [
           "username" => "required",
           "email" => "required",
           "password" => "required",
        ]);

        return response()->json(["msg" => "store user"], 201);
    }

    public function show($id): \Illuminate\Http\JsonResponse {
        return response()->json(["msg" => "show user by ID"]);
    }

    public function update($id) {}
    public function destroy($id) {}
}
