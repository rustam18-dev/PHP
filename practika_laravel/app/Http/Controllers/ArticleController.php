<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {

        $picture = $request->file('picture');
        $img_link = '';
        if ($picture != null){
            $filename = $picture->getClientOriginalName();
            $rand_folder_name = uniqid() . uniqid();
            $img_link = $picture->storeAs("public/article_label/" . $rand_folder_name, $filename);
        }

        $img_link = str_replace("public/", '', $img_link);

        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author = $request->input('author');
//        $article->picture = $img_link;
        $article->picture = $img_link;
        $article->user_id = auth()->id();
        $article->category_id = $request->input('category_id');
        $article->save();

        return redirect()->route('article.index')->with('s', 'Data record!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, int $id)
    {
        $article = Article::findOrFail($id);
        $picture = $request->file('picture');

        if ($picture != null){
            $filename = $picture->getClientOriginalName();
            $rand_folder_name = uniqid() . uniqid();
            $img_link = $picture->storeAs("public/article_label/" . $rand_folder_name, $filename);
            $img_link = str_replace("public/", '', $img_link);
            $article->picture = $img_link;
        }


        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author = $request->input('author');
//        $article->picture = $img_link;
        $article->user_id = auth()->id();
        $article->category_id = $request->input('category_id');
        $article->update();

        return redirect()->route('article.index')->with('s', 'Data record!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('article.index'));
    }
}
