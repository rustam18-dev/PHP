@extends('layouts.app')
@section('content')
    <h3>Страница добавления категории</h3>
    <div style="margin: 50px">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <label>Названия категории<br>
                <input name="title" type="text" placeholder="Category title" value="{{old('title')}}">
                @if($errors->has('title')) <p style="color: red">{{ $errors->first('title') }}</p> @endif
            </label>
            <label>Описание категории<br>
                <input name="description" type="text" placeholder="Category description" value="{{old('description')}}">
                @if($errors->has('description')) <p style="color: red">{{ $errors->first('description') }}</p> @endif
            </label>
            <br>
            <br>
            <br>
           <button type="submit">Готово</button>
           <a  href="{{ route('category.index') }}">Отмена</a>
        </form>
    </div>
@endsection
