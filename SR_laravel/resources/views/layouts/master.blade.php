<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<style>
    .blog-footer {
        padding: 2.5rem 0;
        color: #727272;
        text-align: center;
        background-color: #f9f9f9;
        border-top: .05rem solid #e5e5e5;
    }
    .blog-footer p:last-child {
        margin-bottom: 0;
    }

    .badge_edit {
        font-size: 7px;
        text-decoration: none;
        color: #a2a206;
        margin-right: 3px ;
        border-radius: 6px;
        padding: -5px;
    }
    .badge_delete {
        color: #c90404;
        font-size: 7px;
        text-decoration: none;
        border-radius: 6px;
    }
    .badge_delete, .badge_edit {
        display: flex;
        align-items: center;
        padding-top: -5px;
        font-weight: bold;
    }

</style>
<body>
<div class="container">
    @include('layouts.header')

</div>

<div class="container-fluid">
    <div class="row">
            @include('layouts.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @include('layouts.flash_message')

            @yield('content')
        </main>

    </div>
</div>
@include('layouts.footer')
</body>
</html>