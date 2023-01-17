<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {
        $tasks = Task::get();

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
        $this->validate(\request(), [
            'title' => 'required',
            'body' => 'required',
        ]);


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
       Task::create(\request()->all());
        return redirect('/tasks');


    }

}
