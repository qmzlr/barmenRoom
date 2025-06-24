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