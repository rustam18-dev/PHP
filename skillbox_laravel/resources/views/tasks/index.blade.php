@extends('layout.master')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Создание Задачи
            </h3>

                @foreach($tasks as $task)
                    @include('tasks.item')
                @endforeach

            <nav class="blog-pagination" aria-label="Pagination">
                <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
                <a class="btn btn-outline-secondary rounded-pill disabled">Newer</a>
            </nav>


@endsection



