<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Application\Handlers\Project\ListProjectsHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ListProjectsController extends Controller
{
/**
 * @OA\Get(
 *     path="/api/projects",
 *     summary="Listar todos os projetos",
 *     tags={"Project"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="Accept",
 *         in="header",
 *         required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Lista de projetos",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Project")
 *         )
 *     )
 * )
 */
    public function __invoke(ListProjectsHandler $handler): JsonResponse
    {
        return response()->json($handler());
    }
}