@extends('layouts.master')
@section('content')
    <form method="POST" action="/" enctype="multipart/form-data">
        @csrf
        @include('layouts.errors')
        <div class="mb-3">
            <label  class="form-label">Название задачи</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Цена</label>
            <input type="number" class="form-control" name="price" value="{{old('price')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Фото</label>
            <input type="file" class="form-control" name="image" value="{{old('image')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Описание</label>
            <textarea  class="form-control" name="description">{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Категория</label>
            <select class="" name="category_id">
            @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection