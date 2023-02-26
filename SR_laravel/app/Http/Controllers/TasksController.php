<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Arg;

class TasksController extends Controller
{
    public function index()
    {
        $category_task = Tasks::all();
        return view('tasks.index', compact('category_task'));
    }

    public function show(Tasks $task)
    {

        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $task = new Tasks;
        $task->title = \request('title');
        $task->price = \request('price');
        $task->description = \request('description');
        $task->image = request()->file('image')->store('public/images');
        $task->category_id = \request('category_id');
        $task->save();

        flash('Запись успешно создан!', 'success');
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $task = Tasks::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Tasks $task)
    {

        $attributes =  \request()->validate([
            'title' => 'required|min:2',
            'price' => 'required|min:2',
            'image' => 'required',
            'description' => 'required',
        ]);

        $task->update($attributes);

        if ($request->hasFile('image')) {
            // удалить старое изображение из хранилища
            Storage::delete($task->image);

            // сохранить новое изображение
            $task->image = $request->file('image')->store('public/images');
        }

        $task->save();

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
