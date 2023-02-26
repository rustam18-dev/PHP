@extends('layouts.master')
@section('content')
        <form method="POST" action="/category/{{$category->id}}">
            @csrf
            @method('PATCH')
            @include('layouts.errors')
            <div class="mb-3">
                <label  class="form-label">Название тега</label>
                <input type="text" class="form-control" name="title" value="{{old('title', $category->title)}}">
            </div>


            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
@endsection
