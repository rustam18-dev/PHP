<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
   public function index(Category $category)
   {
       $category = Category::all();
       return view('category.index', compact('category'));
   }

   public function show(Category $category)
   {
       return view('category.show', compact('category'));
   }

   public function create()
   {

       return view('category.create');
   }

   public function store(Category $category)
   {
       $category = new Category;
       $category->title = \request('title');
       $category->save();

       flash('Запись успешно создан!', 'success');
       return redirect('/category');
   }

   public function edit($id)
   {
       $category = Category::find($id);
       return view('category.edit', compact('category'));
   }

   public function update(Category $category)
   {
        $attributes = \request()->validate([
            'title' => 'required',
        ]);

       $category->update($attributes);

       flash('Тег успешно обновлён!', 'warning');

       return redirect("/category/$category->id");
   }

   public function destroy(Category $category)
   {
       $category->delete();

       flash('Тег успешно удалён!', 'danger');

       return redirect('/category');
   }
}
