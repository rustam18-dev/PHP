@extends('layouts.master')

@section('content')
    <form method="POST" action="/category" >
        @csrf
        @include('layouts.errors')
        <div class="mb-3">
            <label  class="form-label">Название категории</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection