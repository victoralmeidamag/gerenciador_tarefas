<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\ListAllTasksHandler;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use App\Application\Handlers\Task\ListProjectTasksHandler;

use App\Interfaces\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class ListTasksController extends Controller
{
    /**
 * @OA\Get(
 *     path="/api/projects/{projectId}/tasks",
 *     summary="Listar tarefas de um projeto",
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
 *     @OA\Response(
 *         response=200, description="Lista de tarefas do projeto",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Task"))
 *     )
 * )
 */

    public function listProjectTasks(string $projectId, ListProjectTasksHandler $handler): JsonResponse
    {
        $tasks = $handler(Uuid::fromString($projectId));
        return response()->json(TaskResource::collection($tasks));
    }

    /**
 * @OA\Get(
 *     path="/api/tasks",
 *     summary="Listar todas as tarefas",
 *     tags={"Task"},
 *     security={"bearerAuth"},
 *     @OA\Parameter(
 *         name="Accept", in="header", required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *     @OA\Response(
 *         response=200, description="Lista global de tarefas",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Task"))
 *     )
 * )
 */
    public function listAll(ListAllTasksHandler $handler): JsonResponse
    {
        return response()->json(TaskResource::collection($handler()));
    }
}