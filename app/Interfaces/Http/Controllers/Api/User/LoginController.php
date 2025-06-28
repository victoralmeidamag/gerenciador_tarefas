<?php

namespace App\Interfaces\Http\Controllers\Api\User;


use App\Application\Handlers\User\LoginUserHandler;
use App\Application\Services\AuthTokenService;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\LoginUserRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/login",
 *     summary="Autenticar usuário",
 *     tags={"User"},
 *     @OA\Parameter(
 *         name="Accept", in="header", required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email","password"},
 *             @OA\Property(property="email", type="string", format="email", example="victor@email.com"),
 *             @OA\Property(property="password", type="string", format="password", example="12345678")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login bem-sucedido",
 *         @OA\JsonContent(
 *             @OA\Property(property="user",  type="object"),
 *             @OA\Property(property="token", type="string")
 *         )
 *     ),
 *     @OA\Response(response=401, description="Credenciais inválidas")
 * )
 */

   public function login(LoginUserRequest $req, LoginUserHandler $handler, AuthTokenService $tokens): JsonResponse
    {
        $user = $handler($req->toCommand());

        $token = $tokens->forUserId($user->id);

        return response()->json(['user' => $user->toArray(), 'token' => $token]);
    }
}
