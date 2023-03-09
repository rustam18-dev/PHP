@extends('layout.master')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Созданные Задачи
            </h3>

             @forelse($tasks as $task)
                @include('tasks.item')
             @empty
                <p>Нету расписанных задач, можете отдыхать!</p>
             @endforelse
{{--                @each('tasks.item', $tasks, 'task') // Идентичен верхней записи --}}

          {{ $tasks->links() }}


@endsection



