@extends('layouts.app')
@section('content')
    <h3>Страница обновления категории</h3>
    <div style="margin: 50px">
        <form action="{{ route('category.update', $category->id) }}" method="POST" >
            @csrf
            @method('PATCH')
            <label>Названия категории<br>
                <input name="title" type="text" placeholder="Category title" value="{{$category->title}}">
                @if($errors->has('title')) <p style="color: red">{{ $errors->first('title') }}</p> @endif
            </label>
            <br>
            <label>Описание категории<br>
                <input name="description" type="text" placeholder="Category description" value="{{$category->description}}">
                @if($errors->has('description')) <p style="color: red">{{ $errors->first('description') }}</p> @endif
            </label>
            <br>
            <button type="submit">Обновить</button>
            <a  href="{{ route('category.index') }}">Отмена</a>
        </form>
    </div>
@endsection
