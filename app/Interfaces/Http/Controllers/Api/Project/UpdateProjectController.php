<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Application\Handlers\Project\UpdateProjectHandler;
use App\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\UpdateProjectRequest;
use App\Interfaces\Http\Resources\ProjectResource;
use Illuminate\Http\JsonResponse;

class UpdateProjectController extends Controller
{
    public function __invoke(UpdateProjectRequest $req, string $id, UpdateProjectHandler $handler): JsonResponse
    {
        $project = $handler($req->toCommand($id));
        return response()->json(ProjectResource::make($project));
    }
}