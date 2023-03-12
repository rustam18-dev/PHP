@extends('layouts.app')
@section('content')
    <h3>Страница добавления статьи</h3>
    <div style="margin: 50px">
        <form action="{{ route('article.store') }}" method="POST" name="" enctype="multipart/form-data">
            @csrf
            <label>Названия статьи<br>
                <input name="title" type="text" placeholder="Article title" value="{{old('title')}}">
                @if($errors->has('title')) <p style="color: red">{{ $errors->first('title') }}</p> @endif
            </label>
            <br>
            <br>
            <br>
            <label>Содержания<br>
                <textarea name="content" rows="6" cols="20">{{ old('content') }}</textarea>
                @if($errors->has('content')) <p style="color: red">{{ $errors->first('content') }}</p> @endif
            </label>
            <br>
            <br>
            <label>Автор<br>
                <input name="author" type="text" placeholder="Article title" value="{{ old('author') }}">
                @if($errors->has('author')) <p style="color: red">{{ $errors->first('author') }}</p> @endif
            </label>
            <br>
            <br>
            <label>Обложка<br>
                <input name="picture" type="file" placeholder="Article title">
                @if($errors->has('picture')) <p style="color: red">{{ $errors->first('picture') }}</p> @endif
            </label>

            <br>
            <br>
            <label>Категории<br>
                <select name="category_id">
                    <option  disabled selected value="">Выберите категорию</option>
                    @foreach($categories as $category)
                    <option    value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id')) <p style="color: red">{{ $errors->first('category_id') }}</p> @endif
            </label>
            <br>
            <br>
           <button type="submit">Готово</button>
           <a  href="{{ route('article.index') }}">Отмена</a>
        </form>
    </div>
@endsection
