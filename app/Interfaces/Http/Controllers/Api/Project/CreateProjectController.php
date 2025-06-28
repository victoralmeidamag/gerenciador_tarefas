<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Interfaces\Http\Requests\CreateProjectRequest;
use App\Application\Handlers\Project\CreateProjectHandler;

class CreateProjectController extends Controller
{
/**
 * @OA\Post(
 *     path="/api/projects",
 *     summary="Criar projeto",
 *     tags={"Project"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="Accept",
 *         in="header",
 *         required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","responsible_id"},
 *             @OA\Property(property="name", type="string", example="Novo Projeto"),
 *             @OA\Property(property="responsible_id", type="string", format="uuid", example="529fabc0-7558-4981-8813-e712cd74413e")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Projeto criado",
 *         @OA\JsonContent(
 *             @OA\Property(property="project", type="object",
 *                 @OA\Property(property="id", type="string", format="uuid"),
 *                 @OA\Property(property="name", type="string"),
 *                 @OA\Property(property="responsible_id", type="string", format="uuid"),
 *                 @OA\Property(property="created_at", type="string", format="date-time"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time")
 *             )
 *         )
 *     ),
 *     @OA\Response(response=422, description="Erro de validação")
 * )
 */
    public function __invoke(CreateProjectRequest $req, CreateProjectHandler $handler): JsonResponse
    {
        $project = $handler($req->toCommand());

        return response()->json(['project' => $project->toArray()], 201);
    }
}