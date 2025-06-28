<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Application\Handlers\Project\DeleteProjectHandler;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeleteProjectController extends Controller
{
    public function __invoke(string $id, DeleteProjectHandler $handler): JsonResponse
    {
        $handler(Uuid::fromString($id));
        return response()->json([
            'message' => 'Projeto Deletado'
        ], 204);
    }
}