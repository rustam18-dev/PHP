@extends('layouts.app')
@section('content')
    <h1>Просмотр статьи</h1>
    <div>
        <a href="{{ route('article.create') }}">Create</a>
    </div>
    <table>
        <thead>
        <tr>
            <th>№</th>
            <th>Обложка</th>
            <th>Название</th>
            <th>Автор</th>
            <th>Категория</th>
            <th>Дата добавления</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($articles))
            @forelse($articles as  $article)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="storage/{{$article->picture}}" alt="{{$article->picture}}" width="60"></td>
                    <td>{{$article->title }}</td>
                    <td>{{$article->author }}</td>
                    <td>{{$article->category->title }}</td>
                    <td>{{$article->created_at }}</td>
                    <td><a href="/article/{{$article->id}}/edit">Изменить</a></td>
                    <td>
                        <form action="/article/{{$article->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Удалить">
                        </form>
                    </td>
                    </tr>
            @empty
                <tr><td colspan="6" >{{ __('Нет статьи') }}</td></tr>
            @endforelse
            @endif
        </tbody>
    </table>
@endsection
