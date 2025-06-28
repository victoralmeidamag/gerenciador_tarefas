<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\CreateTaskRequest;
use App\Application\Handlers\CreateTaskHandler;
use App\Interfaces\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function store(CreateTaskRequest $request, CreateTaskHandler $handler)
    {
        $task = $handler($request->toCommand());
        return TaskResource::make($task);
    }
}
