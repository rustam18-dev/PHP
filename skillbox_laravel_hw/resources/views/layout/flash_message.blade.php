@if(session()->has('message'))
    @component('components.alert', ['type' => session('message_type')])
        {{session('message')}}
    @endcomponent
@endif
