<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Application\Handlers\Project\GetProjectHandler;
use App\Application\Queries\GetProject;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Resources\ProjectResource;
use Illuminate\Http\JsonResponse;

class GetProjectController extends Controller
{
    public function __invoke(string $id, GetProjectHandler $handler): JsonResponse
    {
        $project = $handler(new GetProject(Uuid::fromString($id)));
        return $project ? response()->json(ProjectResource::make($project)) : response()->json(['message' => 'Projeto não encontrado'], 404);
    }

}