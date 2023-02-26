<?php

namespace App\Http\Controllers;
use App\Events\TaskCreated;
use App\Tag;
use App\Task;
use Illuminate\Http\Request;
use PhpParser\ErrorHandler\Collecting;
use PHPUnit\Util\Filesystem;


class TasksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:update,task')->except(['index', 'store', 'create']);
    }

    public function index()
    {

        $tasks = auth()->user()->tasks()->with('tags')->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        //TODO: Валидация полей
//        $this->validate(\request(), [
//            'title' => 'required',
//            'body' => 'required',
//        ]);

        // Эти записи эквивалентны
        $attributes = \request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $attributes['owner_id'] = auth()->id();

        //dd(request()->get('title'), request(['title', 'body']));

        // Создать новую задачу
//        $task = new Task();
//
//        $task->title = request('title');
//        $task->body = request('body');
//
//        // Сохранить её в базу данных
//
//        $task->save();
        // Редирект на страницу со списком задач

//        return redirect('/tasks');
    // TODO: Упрашение кода

//        Task::create([
//           'title' => request('title'),
//           'body' => request('body'),
//        ]);
    //TODO: можно сократить ещё
        Task::create($attributes);

        flash('Задача успешно создана!');

        return redirect('/tasks');


    }

    public function edit(Task $task)
    {
//        abort_if($task->owner_id !== auth()->id(), 403);

//        abort_if(! auth()->user()->onws($task), 403);
//        abort_unless(auth()->user()->onws($task), 403);

//          $this->authorize('update', $task);

//        abort_if(\Gate::denies('update', $task), 403);
//        abort_unless(\Gate::allows('update', $task), 403);

//          abort_if(auth()->user()->cannot('update', $task), 403);
//          abort_unless(auth()->user()->can('update', $task), 403);

        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task)
    {
        $attributes =  \request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $task->update($attributes);


//        $task->update(\request(['title', 'body']));

        /** var Collection $taskTags */


        $taskTags = $task->tags->keyBy('name');

        $tags = collect(explode(', ', \request('tags')))->keyBy(function ($item) { return $item; });

        $syncIds = $taskTags->intersectByKeys($tags)->pluck('id')->toArray();

        $tagsToAttach = $tags->diffKeys($taskTags);
//        $tagsToDetach = $taskTags->diffKeys($tags);
//
//        foreach ($tagsToAttach as $tag) {
//            $tag = Tag::firstOrCreate(['name' => $tag]);
//            $task->tags()->attach($tag);
//        }
//
//        foreach ($tagsToDetach as $tag) {
//            $task->tags()->detach($tag);
//        }

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $task->tags()->sync($syncIds);

        flash('Задача успешно обновлена!', 'warning');

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        flash('Задача успешно удалён!', 'danger');

        return redirect('/tasks');
    }


}
