<div class="alert alert-{{ $type ?? 'danger' }} mt-4">
    @isset($title)
        <h4 class="alert-heading">{{ $title }}</h4>
    @endisset
    {{$slot}}
</div>

{{--<div class="alert alert-{{ $type }}" role="alert">--}}
{{--        <h4 class="alert-heading">{{ $title }}</h4>--}}
{{--        {{ $slot }}--}}
{{--</div>--}}