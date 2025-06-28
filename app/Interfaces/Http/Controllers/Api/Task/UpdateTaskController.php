<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\UpdateTaskHandler;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\UpdateTaskRequest;
use App\Interfaces\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class UpdateTaskController extends Controller
{
    public function __invoke(string $id, UpdateTaskRequest $request, UpdateTaskHandler $handler): JsonResponse
    {
        $task = $handler($request->toCommand($id));
        return response()->json(new TaskResource($task));
    }
}