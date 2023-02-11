@extends('layout.master')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Изменение задачи
            </h3>
            @include('layout.errors')

            <form method="post" action="/tasks/{{ $task->id }}">

                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="InputTitle" class="form-label" >Название задачи</label>
                    <input type="text" class="form-control" id="InputTitle" placeholder="Введите название задачи"
                           name="title"
                           value="{{ old('title', $task->title) }}">
                </div>
                <div class="mb-3">
                    <label for="InputBody" class="form-label">Описание задачи</label>
                    <textarea name="body" class="form-control" id="InputBody">{{ old('body', $task->body) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="InputTags" class="form-label">Теги</label>
                    <input  type="text"
                            name="tags"
                            class="form-control"
                            id="InputTags"
                            value="{{old('tags', $task->tags->pluck('name')->implode(', '))}}"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>

            <form action="/tasks/{{$task->id}}" method="post" class="mt-10">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>

@endsection

