@extends('layouts.base')
@section('title', 'Создание рецепта')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection
@section('js')
    <script src="{{ asset('js/js.js') }}"></script>
@endsection
@section('content')
    <main class="container">
        <h1 class="page-title">Создать новый рецепт</h1>

        <form class="recipe-form" action="{{ route('recipe.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="recipe-name">Название рецепта</label>
                <input type="text" name="name" id="recipe-name" placeholder="Введите название рецепта" required>
            </div>

            <div class="form-group">
                <label for="recipe-image">Изображение рецепта</label>
                <div class="image-upload">
                    <input type="file" id="recipe-image" name="image" accept="image/*">
                    <label for="recipe-image" class="upload-btn">
                        <i class="fas fa-cloud-upload-alt"></i> Выберите файл
                    </label>
                    <span class="file-name">Файл не выбран</span>
                </div>
            </div>

            <div class="form-group">
                <label for="recipe-category">Категория*</label>
                <select id="recipe-category" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

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
                        <button type="button" class="remove-ingredient"><i class="fas fa-times"></i></button>

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

            <div class="form-group">
                <label for="recipe-notes">Примечания</label>
                <textarea id="recipe-notes" name="description"
                          placeholder="Дополнительные заметки, советы..."></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn submit-btn">Опубликовать рецепт</button>
            </div>
        </form>
    </main>
@endsection
