<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Application\Handlers\Project\UpdateProjectHandler;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\UpdateProjectRequest;
use App\Interfaces\Http\Resources\ProjectResource;
use Illuminate\Http\JsonResponse;

class UpdateProjectController extends Controller
{
    /**
 * @OA\Put(
 *     path="/api/projects/{id}",
 *     summary="Atualizar projeto",
 *     tags={"Project"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="Accept",
 *         in="header",
 *         required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="UUID do projeto",
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","responsible_id"},
 *             @OA\Property(property="name", type="string", example="Projeto Atualizado"),
 *             @OA\Property(property="responsible_id", type="string", format="uuid", example="529fabc0-7558-4981-8813-e712cd74413e")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Projeto atualizado",
 *         @OA\JsonContent(ref="#/components/schemas/Project")
 *     ),
 *     @OA\Response(response=422, description="Erro de validação")
 * )
 */

    public function __invoke(UpdateProjectRequest $req, string $id, UpdateProjectHandler $handler): JsonResponse
    {
        $project = $handler($req->toCommand($id));
        return response()->json(ProjectResource::make($project));
    }
}