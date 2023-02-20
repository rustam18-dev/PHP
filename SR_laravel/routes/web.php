<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;




Route::get('/', [TasksController::class, 'index']);
Route::get('/tasks/create', [TasksController::class, 'create']);
Route::post('/', [TasksController::class, 'store']);
Route::get('/tasks/{task}', [TasksController::class, 'show']);
Route::get('/tasks/{task}/edit', [TasksController::class, 'edit']);
Route::patch('/tasks/{task}', [TasksController::class, 'update']);
Route::delete('/tasks/{task}', [TasksController::class, 'destroy']);
