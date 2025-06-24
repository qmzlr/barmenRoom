@extends('layouts.admin')
@section('title', 'Добавление новости')
@section('content')
    <main>

        @include('includes.admin_nav')

        <form action="">
            <input type="text" placeholder="Название">
            <input type="text" placeholder="Описание">
            <input type="file" name="image" accept="image/*">
            <input type="submit" value="Сохранить">
        </form>


    </main>
@endsection
