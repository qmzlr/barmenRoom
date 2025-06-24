@extends('layouts.admin')
@section('title', 'Список рецептов')
@section('content')
    @include('includes.admin_nav')
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