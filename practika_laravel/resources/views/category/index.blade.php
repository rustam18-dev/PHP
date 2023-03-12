@extends('layouts.app')
@section('content')
    <h1>Просмотр категории</h1>
    <div>
        <a href="{{ route('category.create') }}">Create</a>
    </div>
    <table>
        <thead>
        <tr>
            <th>№</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($categories))
            @forelse($categories as  $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->title }}</td>
                    <td>{{$category->description }}</td>
                    <td><a href="/category/{{$category->id}}/edit">Изменить</a></td>
                    <td>
                        <form action="/category/{{$category->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Удалить">
                        </form>
                    </td>
                    </tr>
            @empty
                <tr><td colspan="6" >{{ __('Нет категории') }}</td></tr>
            @endforelse
            @endif
        </tbody>
    </table>
@endsection
