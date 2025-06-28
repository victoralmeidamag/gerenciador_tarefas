<?php

namespace App\Interfaces\Http\Controllers\Api\Project;

use App\Application\Handlers\Project\ListProjectsHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ListProjectsController extends Controller
{
    public function __invoke(ListProjectsHandler $handler): JsonResponse
    {
        return response()->json($handler());
    }
}