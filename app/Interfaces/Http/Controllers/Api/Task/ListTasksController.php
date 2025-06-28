<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use App\Application\Handlers\Task\ListProjectTasksHandler;

use App\Interfaces\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class ListTasksController extends Controller
{
    public function __invoke(string $projectId, ListProjectTasksHandler $handler): JsonResponse
    {
        $tasks = $handler(Uuid::fromString($projectId));
        return response()->json(TaskResource::collection($tasks));
    }
}