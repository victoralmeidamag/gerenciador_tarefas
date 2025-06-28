<?php

namespace App\Interfaces\Http\Controllers\Api\User;


use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\RegisterUserRequest;
use App\Application\Handlers\User\RegisterUserHandler;
use Illuminate\Http\JsonResponse;

class RegisterUserController extends Controller
{
    public function register(RegisterUserRequest $request, RegisterUserHandler $handler): JsonResponse
    {
        $user = $handler($request->toCommand());

        return response()->json([
            'message' => 'User registered',
            'user'    => $user->toArray(),
            'token' => $user->createToken('api')->plainTextToken
        ], 201);
    }
}
