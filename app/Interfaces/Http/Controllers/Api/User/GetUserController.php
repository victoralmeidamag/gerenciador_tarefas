<?php

namespace App\Interfaces\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class GetUserController extends Controller
{
  /**
 * @OA\Get(
 *     path="/api/me",
 *     summary="Obter usuário autenticado",
 *     tags={"User"},
 *     security={"bearerAuth"},
 *     @OA\Parameter(
 *         name="Accept", in="header", required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Usuário autenticado",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(response=401, description="Não autenticado")
 * )
 */

  public function me(): JsonResponse
    {
        return response()->json(Auth::user());
    }
}
