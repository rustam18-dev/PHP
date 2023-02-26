@extends('layouts.master')
@section('content')
    <h2>Category</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col"><span style="margin-left: 90px">action</span></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td class="d-flex pb-4">

                    <a href="/category" class="btn btn-primary me-1" >Назад</a>
                    <form method="post" action="/category/{{$category->id}}" class="me-1">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Удалить">
                    </form>
                    <a href="/category/{{$category->id}}/edit" class="btn btn-warning">Изменить</a>
                </td>
            </tbody>
        </table>
    </div>
@endsection