<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Interfaces\Http\Requests\CreateProjectRequest;
use App\Application\Handlers\Project\CreateProjectHandler;

class CreateProjectController extends Controller
{
    public function __invoke(CreateProjectRequest $req, CreateProjectHandler $handler): JsonResponse
    {
        $project = $handler($req->toCommand());
        return response()->json(['project' => $project->toArray()], 201);
    }
}