@extends('layouts.admin')
@section('title', 'Редактирование рецепта')
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
    <h1>Редактирование рецепта</h1>
    <form action="{{ route('admin.recipes.update', $recipe) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input type="text" name="title" value="{{ $recipe->title }}" placeholder="Название">
        <input type="text" name="description" value="{{ $recipe->description }}" placeholder="Описание">
        <input type="file" name="image" accept="image/*">

        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                        @if ($category->id == $recipe->category_id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Сохранить">

    </form>
@endsection