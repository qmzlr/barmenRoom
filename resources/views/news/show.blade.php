@extends('layouts.base')
@section('title', 'Новость' . $news->title)
@section('content')
    <h1>{{ $news->title }}</h1>
    <p>{{ $news->description }}</p>
    <p>{{ $news->author }}</p>
@endsection
