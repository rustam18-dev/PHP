@extends('layouts.master')
@section('content')
    <h2>Главная</h2>
    <div class="table-responsive">
        @foreach($task as $tasks)
        <article class="blog-post">
            <h2 class="blog-post-title" ><a href="/tasks/{{$tasks->id}}">{{$tasks->title}}</a></h2>
            <p class="blog-post-meta">{{$tasks->created_at->toFormattedDateString()}} </p>

            {{$tasks->description}}
        </article>
        <hr>
        @endforeach
    </div>
@endsection