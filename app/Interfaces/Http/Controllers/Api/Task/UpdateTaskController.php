<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\UpdateTaskHandler;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\UpdateTaskRequest;
use App\Interfaces\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class UpdateTaskController extends Controller
{
    /**
 * @OA\Put(
 *     path="/api/tasks/{id}",
 *     summary="Atualizar tarefa",
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
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","status"},
 *             @OA\Property(property="name", type="string", example="Título atualizado"),
 *             @OA\Property(property="status", type="string", example="DONE")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200, description="Tarefa atualizada",
 *         @OA\JsonContent(ref="#/components/schemas/Task")
 *     ),
 *     @OA\Response(response=422, description="Erro de validação")
 * )
 */

    public function __invoke(string $id, UpdateTaskRequest $request, UpdateTaskHandler $handler): JsonResponse
    {
        $task = $handler($request->toCommand($id));
        return response()->json(new TaskResource($task));
    }
}