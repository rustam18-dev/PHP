@extends('layouts.master')
@section('content')
    <h2>Главная</h2>
    <div class="table-responsive">
        @foreach($category_task as $category_tasks)
        <article class="blog-post">
            <h2 class="blog-post-title" ><a href="/tasks/{{$category_tasks->id}}">{{$category_tasks->title}}</a></h2>
            <p class="blog-post-meta">{{$category_tasks->created_at->toFormattedDateString()}} </p>
            @isset($category_tasks->category_id)
                <p class="blog-post-meta">{{$category_tasks->category->title}} </p>
            @endisset
        </article>
        <hr>
        @endforeach

    </div>
@endsection