@extends('layouts.admin')
@section('title', 'Добавление новости')
@section('content')
    <main>

        <div id="navPanelByID" class="navPanel">
            <a href="{{route('admin.recipes.create')}}">
                <button id="showAddForm">Добавить рецепт</button>
            </a>
            <a href="{{ route('admin.recipes.index') }}">
                <button>Список рецептов</button>
            </a>
            <a href="{{ route('admin.users.index') }}">
                <button>Список пользователей</button>
            </a>
        </div>

        <form action="">
            <input type="text" placeholder="Название">
            <input type="text" placeholder="Описание">
            <input type="file" name="image" accept="image/*">
            <input type="submit" value="Сохранить">
        </form>


    </main>
@endsection
