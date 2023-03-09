@extends('layout.master')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                {{$task->title}}
            </h3>

            @include('tasks.tags', ['tags' => $task->tags])

            {{$task->body}}

            @if($task->steps->isNotEmpty())
            <ul class="list-group">
                @foreach($task->steps as $step)
                    <li class="list-group-item">
                        <form action="/completed-steps/{{$step->id}}" method="post">
                            @if($step->completed)
                              @method('DELETE')
                            @endif
                            @csrf
                            <div class="form-check">
                                <label class="form-check-label {{$step->completed ? 'completed' : ''}}" >
                                    <input
                                            type="checkbox"
                                            class="form-check-input"
                                            name="completed"
                                            onclick="this.form.submit()"
                                            {{$step->completed ? 'checked' : ''}}
                                    >
                                    {{$step->description}}
                                </label>
                            </div>
                        </form>
                    </li>
                @endforeach
            </ul>
            @endif

            @include('layout.errors')

            <form action="/tasks/{{$task->id}}/steps" class="card card-body mb-4" method="post">
                @csrf

                <div class="form-group">
                    <input
                            type="text"
                            class="form-control"
                            placeholder="Шаг"
                            value="{{old('description')}}"
                            name="description"
                    >
                </div>
                <button class="btn btn-primary" type="submit">Добавить</button>
            </form>

        @include('layout.errors')

            <hr>
            @forelse($task->history as $item)

                <p>{{ $item->email }} - {{ $item->pivot->created_at->diffForHumans() }} - {{ $item->pivot->before }} - {{ $item->pivot->after }}</p>
            @empty
                <p>Нет истории изменении</p>
            @endforelse


            <hr>
            <a href="/tasks">Вернуться к списку</a>
            <hr>
            @can('update', $task)
                <a href="/tasks/{{$task->id}}/edit">Edit</a>
            @endcan
@endsection



