<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\GetTaskHandler;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class GetTaskController extends Controller
{
    /**
 * @OA\Get(
 *     path="/api/tasks/{id}",
 *     summary="Detalhar tarefa",
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
 *     @OA\Response(
 *         response=200, description="Tarefa encontrada",
 *         @OA\JsonContent(ref="#/components/schemas/Task")
 *     ),
 *     @OA\Response(response=404, description="Tarefa não encontrada")
 * )
 */
    public function __invoke(string $id, GetTaskHandler $handler): JsonResponse
    {
        $task = $handler(Uuid::fromString($id));
        return $task ? response()->json(new TaskResource($task)) : response()->json(['message' => 'Not found'], 404);
    }
}