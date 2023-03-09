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
                <th scope="col">image</th>
                <th scope="col">description</th>
                <th scope="col"><span style="margin-left: 90px">action</span></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->name}}</td>
                <td>{{$task->price}}</td>
                <td class="pb-n2"><img src="{{Storage::url($task->image) }}" alt="{{ $task->name }}" width="50" height="50"></td>
                <td>{{$task->description}}</td>
                <td class="d-flex pb-4">

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