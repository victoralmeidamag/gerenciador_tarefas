<?php

use App\Interfaces\Http\Controllers\Api\User\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\Api\AuthController;
use App\Interfaces\Http\Controllers\Api\ProjectController;
use App\Interfaces\Http\Controllers\Api\TaskController;


Route::get('regsiter', function (){
    return response()->json([
        'false' => true
    ], 200);
});

Route::post('register', [RegisterUserController::class, 'register']);

// Route::post('login',    [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {

//     Route::get('me',     [AuthController::class, 'me']);
//     Route::post('logout',[AuthController::class, 'logout']);

//     Route::apiResource('projects', ProjectController::class);
//     Route::get( 'projects/{project}/tasks', [TaskController::class, 'index']);
//     Route::post('projects/{project}/tasks', [TaskController::class, 'store']);

//     Route::apiResource('tasks', TaskController::class)->only([
//         'show', 'update', 'destroy'
//     ]);
// });
