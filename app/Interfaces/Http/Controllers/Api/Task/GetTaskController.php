<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\GetTaskHandler;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class GetTaskController extends Controller
{
    public function __invoke(string $id, GetTaskHandler $handler): JsonResponse
    {
        $task = $handler(Uuid::fromString($id));
        return $task ? response()->json(new TaskResource($task)) : response()->json(['message' => 'Not found'], 404);
    }
}