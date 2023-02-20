@if(session()->has('message'))
    <div class="alert alert-{{session('message_type')}} mt-4">
        {{session('message')}}
    </div>
@endif
