<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\DeleteTaskHandler;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeleteTaskController extends Controller
{
    /**
 * @OA\Delete(
 *     path="/api/tasks/{id}",
 *     summary="Deletar tarefa",
 *     tags={"Task"},
 *     security={"bearerAuth"},
 *     @OA\Parameter(
 *         name="Accept", in="header", required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\Parameter(
 *         name="id", in="path", required=true,
 *         description="UUID da tarefa", @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\Response(response=204, description="Tarefa deletada"),
 *     @OA\Response(response=404, description="Tarefa não encontrada")
 * )
 */
    public function __invoke(string $id, DeleteTaskHandler $handler): JsonResponse
    {
        $handler(Uuid::fromString($id));
        return response()->json([], 204);
    }

}