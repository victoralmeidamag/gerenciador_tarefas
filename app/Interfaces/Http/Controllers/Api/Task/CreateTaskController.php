<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\CreateTaskHandler;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\CreateTaskRequest;
use App\Interfaces\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class CreateTaskController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/projects/{projectId}/tasks",
 *     summary="Criar tarefa em um projeto",
 *     tags={"Task"},
 *     security={"bearerAuth"},
 *     @OA\Parameter(
 *         name="Accept", in="header", required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\Parameter(
 *         name="projectId", in="path", required=true,
 *         description="UUID do projeto", @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","description","assignee_id"},
 *             @OA\Property(property="name", type="string", example="Nova task"),
 *             @OA\Property(property="description", type="string", example="Detalhes da tarefa"),
 *             @OA\Property(property="assignee_id", type="string", format="uuid",
 *                 example="20747cde-02a3-4c9c-af0d-52b6d479e6a2")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201, description="Tarefa criada",
 *         @OA\JsonContent(ref="#/components/schemas/Task")
 *     ),
 *     @OA\Response(response=422, description="Erro de validação")
 * )
 */
    public function __invoke(string $projectId, CreateTaskRequest $request, CreateTaskHandler $handler): JsonResponse
    {
        $tasks = $handler($request->toCommand($projectId));
        return response()->json(new TaskResource($tasks), 201);
    }
}