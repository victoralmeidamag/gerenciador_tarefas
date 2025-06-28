<?php

namespace App\Interfaces\Http\Controllers\Api\Task;

use App\Application\Handlers\Task\DeleteTaskHandler;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeleteTaskController extends Controller
{
    public function __invoke(string $id, DeleteTaskHandler $handler): JsonResponse
    {
        $handler(Uuid::fromString($id));
        return response()->json([], 204);
    }

}