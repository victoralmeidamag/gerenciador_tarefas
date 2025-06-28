<?php

use App\Interfaces\Http\Controllers\Api\User\GetUserController;
use App\Interfaces\Http\Controllers\Api\User\LoginController;
use App\Interfaces\Http\Controllers\Api\User\LogoutController;
use App\Interfaces\Http\Controllers\Api\User\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\Api\AuthController;
use App\Interfaces\Http\Controllers\Api\ProjectController;
use App\Interfaces\Http\Controllers\Api\TaskController;


Route::post('register',[RegisterUserController::class, 'register']);
Route::post('login',[LoginController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('me',[GetUserController::class, 'me']);
    Route::post('logout',[LogoutController::class, 'logout']);

    // Route::apiResource('projects', ProjectController::class);
    // Route::get( 'projects/{project}/tasks', [TaskController::class, 'index']);
    // Route::post('projects/{project}/tasks', [TaskController::class, 'store']);

    // Route::apiResource('tasks', TaskController::class)->only([
    //     'show', 'update', 'destroy'
    // ]);
});
