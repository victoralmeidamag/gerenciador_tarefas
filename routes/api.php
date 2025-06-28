<?php

use App\Interfaces\Http\Controllers\Api\Project\CreateProjectController;
use App\Interfaces\Http\Controllers\Api\Project\DeleteProjectController;
use App\Interfaces\Http\Controllers\Api\Project\GetProjectController;
use App\Interfaces\Http\Controllers\Api\Project\ListProjectsController;
use App\Interfaces\Http\Controllers\Api\Project\UpdateProjectController;
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

});
