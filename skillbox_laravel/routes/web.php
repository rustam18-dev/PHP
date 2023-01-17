<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Task;

Route::get('/', function (){
    return view('welcome');
});
Route::get('/tasks', [TasksController::class, 'index']);
Route::get('/tasks/create', [TasksController::class, 'create']);

Route::post('/tasks', [TasksController::class, 'store']);


Route::get('/tasks/{task}', [TasksController::class, 'show']);








