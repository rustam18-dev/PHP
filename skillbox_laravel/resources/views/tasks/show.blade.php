@extends('layout.master')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                {{$task->title}}
            </h3>
            {{$task->body}}
            <hr>
            <a href="/tasks">Вернуться к списку</a>
@endsection



