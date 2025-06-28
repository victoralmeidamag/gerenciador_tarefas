<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\CreateTaskHandler;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\CreateTaskRequest;
use App\Interfaces\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class CreateTaskController extends Controller
{
    public function __invoke(string $projectId, CreateTaskRequest $request, CreateTaskHandler $handler): JsonResponse
    {
        $tasks = $handler(Uuid::fromString($projectId));
        return response()->json(TaskResource::collection($tasks));
    }
}