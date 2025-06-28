<?php

namespace App\Interfaces\Http\Controllers\Api\User;


use App\Application\Handlers\User\LoginUserHandler;
use App\Application\Services\AuthTokenService;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\LoginUserRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
   public function login(LoginUserRequest $req, LoginUserHandler $handler, AuthTokenService $tokens): JsonResponse
    {
        $user = $handler($req->toCommand());

        $token = $tokens->forUserId($user->id);

        return response()->json(['user' => $user->toArray(), 'token' => $token]);
    }
}
