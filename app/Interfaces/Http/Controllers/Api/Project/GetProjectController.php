<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Application\Handlers\Project\GetProjectHandler;
use App\Application\Queries\GetProject;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Resources\ProjectResource;
use Illuminate\Http\JsonResponse;

class GetProjectController extends Controller
{
    /**
 * @OA\Get(
 *     path="/api/projects/{id}",
 *     summary="Detalhar projeto",
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
 *     @OA\Response(
 *         response=200,
 *         description="Projeto encontrado",
 *         @OA\JsonContent(ref="#/components/schemas/Project")
 *     ),
 *     @OA\Response(response=404, description="Projeto não encontrado")
 * )
 */

    public function __invoke(string $id, GetProjectHandler $handler): JsonResponse
    {
        $project = $handler(new GetProject(Uuid::fromString($id)));
        return $project ? response()->json(ProjectResource::make($project)) : response()->json(['message' => 'Projeto não encontrado'], 404);
    }

}