@extends('app')

@section('title', 'Page Demo Title')

@section('content')
    Содержимое Страницы Demo
@endsection

@section('sidebar')
    @parent
    <p>Переопредение  demo содержимое боковой панели</p>

{{--    {{$data}} // Защищённый вывод --}}
{{--    {!! $data !!} // Незащищённый вывод--}}
@endsection
