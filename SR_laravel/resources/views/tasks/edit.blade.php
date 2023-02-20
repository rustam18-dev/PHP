@extends('layouts.master')
@section('content')
        <form method="POST" action="/tasks/{{$task->id}}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label  class="form-label">Название задачи</label>
                <input type="text" class="form-control" name="title" value="{{old('title', $task->title)}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Цена</label>
                <input type="number" class="form-control" name="price" value="{{old('price', $task->price)}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Описание</label>
                <textarea  class="form-control" name="description">{{old('description', $task->description)}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
@endsection
