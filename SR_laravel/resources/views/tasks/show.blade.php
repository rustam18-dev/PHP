@extends('layouts.master')
@section('content')
    <h2>Задание</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">price</th>
                <th scope="col">description</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->price}}</td>
                <td>{{$task->description}}</td>
                <td class="d-flex">

                    <a href="/" class="btn btn-primary me-1" >Назад</a>
                    <form method="post" action="{{$task->id}}" class="me-1">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Удалить">
                    </form>
                    <a href="/tasks/{{$task->id}}/edit" class="btn btn-warning">Изменить</a>
                </td>
            </tbody>
        </table>
    </div>
@endsection