<?php

use App\Http\Controllers\CompletedStepsController;
use App\Http\Controllers\PushServiceController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TaskStepsController;
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
Route::view('/demo', 'demo');


Route::get('/test', function () {
//    dump(\DB::select('select * from tasks where  id = ?', [1]));
//    dump(\DB::insert('insert  into tasks  (title, body, owner_id)  values (?, ?, ?)', ['User name', 'username@gmail.com', '1']));
//   dump(\DB::update("update tasks set title = 'FirstTasks', body = 'FirstTasksWithDescription' where id = ?", [1]) );
//    dump(\DB::delete("delete from tasks"));
//    dump(\DB::statement('drop table tasks'));
//    dump(\DB::table('tasks')->count());
//    dump(\DB::table('tasks')->max('id'));
//    dump(\DB::table('tasks')->average('id'));
//    dump(\DB::table('tasks')->where('id', 6)->doesntExist());
//    dump(\DB::table('tasks')->select('type')->distinct()->get());
//    dump(\DB::table('steps')
//        ->selectRaw('id * ? as big_id', [10])
//        ->get()
//    );
//    dump(\DB::table('tasks')->select('id')->orderByRaw('id ASC')->get());
//    dump(\DB::table('users')
//        ->join('tasks', 'users.id', '=', 'tasks.owner_id')
//        ->join('companies', 'users.id', '=', 'companies.owner_id')
//        ->select('users.id', 'users.email', 'tasks.title', 'companies.name')
//        ->get()
//    );
//    dump(\DB::table('users')
//        ->leftJoin('companies', 'users.id', '=', 'companies.owner_id')
//        ->select('users.id', 'users.email', 'companies.name')
//        ->get()
////    );
//    dump(\DB::table('users')
//        ->crossJoin('companies')
//        ->select('users.id', 'users.email', 'companies.name')
//        ->get()
//    );
//      dump(\DB::table('tasks')
//         ->where('type','Old')
//         ->orWhere('type', 'New')
//         ->get()
//      );
//    dump(\DB::table('tasks')
//        ->whereIn('id', [1, 2])
//        ->whereNotIn('id', [1, 2])
//            ->select('id', 'title')
//        ->get()
//    );
//    dump(\DB::table('tasks')
//        ->whereNull('options')
//        ->whereNotNull('options')
//        ->get()
//    );
//    dump(\DB::table('tasks')
//        ->whereDate('created_at', '2023-03-08')
//        ->whereMonth('created_at', '12')
//        ->whereDay('created_at', '31')
//        ->whereDay('created_at', '2009')
//        ->whereDay('created_at', '9:37:21')
//        ->get()
//    );
//    dump(\DB::table('tasks')
//        ->whereColumn('updated_at', '>', 'created_at')
//        ->get()
//    );
//    dump(\DB::table('users')
//        ->whereExists(function ($query) {
//            $query
//                ->select(DB::raw(1))
//                ->from('tasks')
//                ->whereRaw('tasks.owner_id = users.id')
//                ->get();
//        })
//    );
//    dump(\DB::table('tasks')
//        ->oldest('id')
//        ->latest('id')
//        ->orderBy('id')
//        ->orderByDesc('id')
//        ->get()
//    );
//    dump(\DB::table('tasks')
//        ->inRandomOrder()
//        ->select('id', 'title')
//        ->get()
//    );
//    dump(\DB::table('tasks')
//        ->skip(2)
//        ->take(1)
//        ->get()
//    );
//    dump(\DB::table('tasks')
//        ->offset(2)
//        ->limit(1)
//        ->get()
//    );

    dump(\App\Models\Image::with('imageable')
        ->get()
        ->loadMorph('imageable', [
            \App\Models\User::class => ['company', 'tasks'],
            \App\Models\Company::class => ['user']
        ])
        ->toArray()
    );



});
//Route::get('/test', function (\Illuminate\Http\Request $request ) {
////    \Session::put(['name' => 'test']);
////    session()->get('name');
////    session(['name' => 'test']);
//
//    dd($request->session()->al));
//
//    return session('test', 'defaultValue');
//});


/**
 * GET /tasks (index)
 * GET /tasks/create (create)l(
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

Route::middleware('auth')->post('/companies', function () {
    $attributes = request()->validate(['name' => 'required']);
    $attributes['owner_id'] = auth()->id();

    \App\Models\Company::create($attributes);
});

Route::get('/service', [PushServiceController::class, 'form']);
Route::post('/service', [PushServiceController::class, 'send']);

