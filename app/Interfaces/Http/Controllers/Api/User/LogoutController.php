<?php

namespace App\Interfaces\Http\Controllers\Api\User;


use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\JsonResponse;

class LogoutController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/logout",
 *     summary="Encerrar sessão",
 *     tags={"User"},
 *     security={"bearerAuth"},
 *     @OA\Parameter(
 *         name="Accept", in="header", required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Logout realizado",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Logged out")
 *         )
 *     ),
 *     @OA\Response(response=401, description="Não autenticado")
 * )
 */

    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
