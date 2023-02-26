@extends('layouts.master')
@section('content')
    <h2>Главная</h2>
    <div class="table-responsive">
        @foreach($category as $categories)
            <article class="blog-post">
                <h2 class="blog-post-title" ><a href="/category/{{$categories->id}}">{{$categories->title}}</a></h2>
            </article>
            <hr>
        @endforeach
    </div>
@endsection