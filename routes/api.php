<?php

use App\Interfaces\Http\Controllers\Api\Project\CreateProjectController;
use App\Interfaces\Http\Controllers\Api\Project\DeleteProjectController;
use App\Interfaces\Http\Controllers\Api\Project\GetProjectController;
use App\Interfaces\Http\Controllers\Api\Project\ListProjectsController;
use App\Interfaces\Http\Controllers\Api\Project\UpdateProjectController;
use App\Interfaces\Http\Controllers\Api\Task\CreateTaskController;
use App\Interfaces\Http\Controllers\Api\Task\DeleteTaskController;
use App\Interfaces\Http\Controllers\Api\Task\GetTaskController;
use App\Interfaces\Http\Controllers\Api\Task\ListTasksController;
use App\Interfaces\Http\Controllers\Api\Task\UpdateTaskController;
use App\Interfaces\Http\Controllers\Api\User\GetUserController;
use App\Interfaces\Http\Controllers\Api\User\LoginController;
use App\Interfaces\Http\Controllers\Api\User\LogoutController;
use App\Interfaces\Http\Controllers\Api\User\RegisterUserController;
use Illuminate\Support\Facades\Route;


Route::post('register',[RegisterUserController::class, 'register']);
Route::post('login',[LoginController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('me',[GetUserController::class, 'me']);
    Route::post('logout',[LogoutController::class, 'logout']);

    //Rotas de projetos
    Route::post('projects', CreateProjectController::class);
    Route::get('projects', ListProjectsController::class);
    Route::get('projects/{id}', GetProjectController::class);
    Route::put('projects/{id}', UpdateProjectController::class);
    Route::delete('projects/{id}', DeleteProjectController::class);

    //Rotas de Tasks
    Route::get('projects/{projectId}/tasks', [ListTasksController::class, 'listProjectTasks']);
    Route::get('tasks/{id}', GetTaskController::class);
    Route::get('tasks', [ListTasksController::class, 'listAll']);
    Route::post('projects/{projectId}/tasks', CreateTaskController::class);
    Route::put('tasks/{id}', UpdateTaskController::class);
    Route::delete('/tasks/{id}', DeleteTaskController::class);
});
