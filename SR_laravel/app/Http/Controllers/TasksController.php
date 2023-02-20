<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Arg;

class TasksController extends Controller
{
    public function index()
    {
        $task = Tasks::all();
        return view('tasks.index', compact('task'));
    }

    public function show(Tasks $task)
    {

        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $attributes)
    {
        $attributes->validate([
           'title' => 'required|min:3',
           'price' => 'required',
           'description' => 'required',
        ]);

        Tasks::create($attributes->all());
        flash('Запись успешно создан!', 'success');
        return redirect('/');
    }

    public function edit($id)
    {
        $task = Tasks::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Tasks $task)
    {
        $attributes = \request()->validate([
           'title' => 'required|min:3',
           'price' => 'required',
           'description' => 'required'
        ]);

        $task->update($attributes);

        flash('Запись обновлён!', 'warning');

        return redirect("/tasks/$task->id");
    }

    public function destroy(Tasks $task)
    {
        $task->delete();

        flash('Запись удалён!', 'danger');

        return redirect('/');
    }


}
