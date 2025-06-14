@php use Illuminate\Support\Facades\Auth; @endphp
<header>
    <div class="header-main">
        <div>
            <a href="{{route('home')}}"><img src="{{ asset('photo/logo.svg') }}" alt=""></a>
        </div>

        <div class="right-button">
            <a href="{{route('catalog')}}">Поиск</a>
            <a href="{{route('profile.index')}}">Профиль</a>
            @if(Auth::check())
                <a href="{{route('recipe.create')}}">Добавить рецепт</a>
                @if(Auth::user()->is_admin == true)
                    <a href="{{route('admin.index')}}">Админка</a>
                @endif
            @endif

        </div>
    </div>

    <div class="line">
        <hr>
        <p>Barman</p>
        <hr>
    </div>
</header>
