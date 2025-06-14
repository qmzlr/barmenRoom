<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css-body.css') }}">
    @yield('css')
</head>
<body>
<header>
    <a href="{{ route('admin.index') }}"><h1>Админ-панель</h1></a>
    <a href="{{ route('home') }}">Выйти</a>
</header>

@yield('content')
</body>
<script src="{{ asset('js/js.js') }}"></script>
</html>
