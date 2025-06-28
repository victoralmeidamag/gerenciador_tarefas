<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Application\Handlers\Project\DeleteProjectHandler;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeleteProjectController extends Controller
{
    /**
 * @OA\Delete(
 *     path="/api/projects/{id}",
 *     summary="Deletar projeto",
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
 *     @OA\Response(response=204, description="Projeto deletado"),
 *     @OA\Response(response=404, description="Projeto não encontrado")
 * )
 */

    public function __invoke(string $id, DeleteProjectHandler $handler): JsonResponse
    {
        $handler(Uuid::fromString($id));
        return response()->json([
            'message' => 'Projeto Deletado'
        ], 204);
    }
}