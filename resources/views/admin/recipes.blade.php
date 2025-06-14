@extends('layouts.admin')
@section('title', 'Список рецептов')
@section('content')
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
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Категория</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <th scope="row">{{$recipe->id}}</th>
                    <td>{{$recipe->title}}</td>
                    <td>{{str()->limit($recipe->description, 50)}}</td>
                    <td>{{$recipe->category->name}}</td>
                    <td>
                        <a href="{{ route('admin.recipes.edit', ['id' => $recipe->id]) }}">
                            <button>Редактировать</button>
                        </a>
                        <a href="{{ route('admin.recipes.delete', ['id' => $recipe->id]) }}">
                            <button>Удалить</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection