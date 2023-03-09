<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category_task = auth()->user()->tasks()->with('category')->orderBy('id', 'asc')->paginate(2);
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

    public function store()
    {
        $attributes = \request()->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:category,id',
        ]);

        $attributes['owner_id'] = auth()->id();
        Tasks::create($attributes);

        flash('Запись успешно создан!', 'success');
        return redirect('/');
    }

    public function edit($id)
    {
        $task = Tasks::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Tasks $task)
    {

        $attributes =  \request()->validate([
            'name' => 'required|min:2',
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
