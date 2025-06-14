<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>
   @yield('css')
   <link rel="stylesheet" href="{{asset('css/font.css')}}">
   <link rel="stylesheet" href="{{asset('css/css-body.css')}}">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@yield('content')
</body>
</html>
