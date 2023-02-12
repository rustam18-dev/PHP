<?php

use App\Http\Controllers\CompletedStepsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TaskStepsController;
use App\Http\Controllers\TestController;
use App\Service\Pushall;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Task;



//app()->singleton(Pushall::class, function () {
//
//    return new Pushall('private-key');
//});
//
//app()->bind(App\PriceFormatter::class, function () {
//    return new App\OtherPriceFormatter();
//});
//
//Route::get('/test', function (App\PriceFormatter $formatter, App\SimplePriceFormatter $simplePriceFormatter) {
//    dd($formatter->format(9999.98), $simplePriceFormatter->format(10000));
//});




// Идентичен верхней записи
Route::view('/', 'welcome');

//Route::get('/test', function (\Illuminate\Http\Request $request) {
//
////    session()->forget(['name']); // Удаляет сессии
////    session()->has(['name']); // bool
//
//    dd($request->session()->all());
//
//    return session('test', 'deasd');
//});



/**
 * GET /tasks (index)
 * GET /tasks/create (create)
 * GET /tasks/1 (show)
 * POST /tasks (store)
 * GET /tasks/1/edit (edit)
 * PATCH /tasks/1 (update)
 * DELETE /tasks/1 (destroy)
 */

Route::get('/tasks/tags/{tag}', [TagsController::class, 'index']);

// Идентичен с нижними соединениями
Route::resource('/tasks', TasksController::class);

//Route::get('/tasks', [TasksController::class, 'index']);
//Route::get('/tasks/create', [TasksController::class, 'create']);
//Route::post('/tasks', [TasksController::class, 'store']);
//Route::get('/tasks/{task}', [TasksController::class, 'show']);
//Route::get('/tasks/{task}/edit', [TasksController::class, 'edit']);
//Route::patch('/tasks/{task}', [TasksController::class, 'update']);
//Route::delete('/tasks/{task}', [TasksController::class, 'delete']);


Route::post('/tasks/{task}/steps', [TaskStepsController::class, 'store']);

Route::post('/completed-steps/{step}', [CompletedStepsController::class, 'store']);
Route::delete('/completed-steps/{step}', [CompletedStepsController::class, 'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
