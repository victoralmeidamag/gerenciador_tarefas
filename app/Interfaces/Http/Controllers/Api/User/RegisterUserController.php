<?php

namespace App\Interfaces\Http\Controllers\Api\User;


use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\RegisterUserRequest;
use App\Application\Handlers\User\RegisterUserHandler;
use Illuminate\Http\JsonResponse;

class RegisterUserController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/register",
 *     summary="Registrar novo usuário",
 *     tags={"User"},
 *     @OA\Parameter(
 *         name="Accept", in="header", required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","email","password","password_confirmation"},
 *             @OA\Property(property="name",  type="string", example="Victor"),
 *             @OA\Property(property="email", type="string", format="email", example="victor@email.com"),
 *             @OA\Property(property="password", type="string", format="password", example="12345678"),
 *             @OA\Property(property="password_confirmation", type="string", format="password", example="12345678")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Usuário criado",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User registered"),
 *             @OA\Property(property="user", type="object"),
 *             @OA\Property(property="token", type="string")
 *         )
 *     ),
 *     @OA\Response(response=422, description="Erro de validação")
 * )
 */

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
