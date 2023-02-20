@component('mail::message')
# Созадана новая задача: {{$task->title}}

    {{$task->body}}

@component('mail::button', ['url' => '/tasks/' . $task->id])
Посмотреть задачу
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent