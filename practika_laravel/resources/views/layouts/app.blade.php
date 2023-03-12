<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Laravel BLOG</title>
</head>
<body>
    <div>
        <header>
           @if(isset(Auth::user()->id)) <span> {{ Auth::user()->name }} </span>@endif
        </header>
        <nav>
            <a href="{{ route('home') }}">Main</a>
            <a href="{{ route('article.index') }}">Article</a>
            <a href="{{ route('category.index') }}">Category</a>
            @guest()
                @if(Route::has('login'))
                     <a href="{{ route("login") }}">Войти</a>
            @endif
             @else
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="Выйти">
                        </form>
        @endguest
        </nav>
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
