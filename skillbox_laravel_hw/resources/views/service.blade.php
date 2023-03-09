@extends('layout.master')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Создание Задачи
            </h3>

            @include('layout.errors')

            <form method="post" action="/service">

                @csrf

                <div class="mb-3">
                    <label for="InputTitle" class="form-label" >Название уведомлении</label>
                    <input type="text" class="form-control" id="InputTitle" placeholder="Введите заголовок"
                           name="title"
                           value="{{ old('title') }}" >
                </div>
                <div class="mb-3">
                    <label for="InputText" class="form-label">Описание</label>
                    <textarea  class="form-control" id="InputBody"  name="text">{{ old('text') }}</textarea>

                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>

@endsection
