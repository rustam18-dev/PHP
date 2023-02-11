@php
    $tags = $tags ?? collect();
@endphp


@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="/tasks/tags/{{$tag->getRouteKey()}}" class="badge bg-secondary text-decoration-none">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif