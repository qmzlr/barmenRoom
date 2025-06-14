@extends('layouts.admin')
@section('title', 'Создание рецепта')
@section('js')
    <script src="{{ asset('js/js.js') }}"></script>
@endsection
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
    <h1>Создание рецепта</h1>
    <form action="{{ route('admin.recipes.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Название">
        <input type="text" name="description" placeholder="Описание">
        <input type="file" name="image" accept="image/*">
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label>Ингредиенты</label>
            <div class="ingredients-list">
                <div class="ingredient-item">

                    <input type="text" name="ingredients[{{ $index ?? 0 }}][name]" placeholder="Ингредиент"
                           class="ingredient-name">
                    <input type="text" placeholder="Количество" name="ingredients[{{ $index ?? 0 }}][quantity]"
                           class="ingredient-amount">
                    <input type="text" placeholder="Единицы измерения" name="ingredients[{{ $index ?? 0 }}][unit]"
                           class="ingredient-amount">
                </div>
            </div>
            <div class="flex">
                <button type="button" class="add-ingredient-btn" onclick="addIngredient()">
                    <i class="fas fa-plus"></i> Добавить ингредиент
                </button>
                <button type="button" class="add-ingredient-btn" onclick="removeIngredient()">
                    <i class="fas fa-plus"></i> Удалить ингредиент
                </button>
            </div>

        </div>
        <input type="submit" value="Сохранить">
    </form>
@endsection