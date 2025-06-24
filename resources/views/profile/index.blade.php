@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.base')
@section('title', 'Профиль')
@section('css')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('content')
    <main>
        <div class="header-info">

            <img class="avatar" src="{{Auth::user()->avatar}}" alt="avatar">

            <div class="Data-profile">

                <h1>{{__('Личные данные:')}}</h1>

                <div class="data-css">
                    <div id="data-output">
                        <h2>{{__('ФИО:')}}</h2>
                        <p>{{__(Auth::user()->name)}}</p>
                    </div>

                    <div id="data-output">
                        <h2>{{__('Номер телефона:')}}</h2>
                        <p>{{__(Auth::user()->phone)}}</p>
                    </div>

                    <div id="data-output">
                        <h2>Дата рождения:</h2>
                        <p>{{__(Auth::user()->date_of_birth)}}</p>
                    </div>

                    <div id="data-output">
                        <h2>{{__('Электронная почта:')}}</h2>
                        <p>{{__(Auth::user()->email)}}</p>
                    </div>
                </div>

                <div class="button-profile-header">
                    <a href="{{route('profile.edit')}}">
                        <button>{{__('Изменить данные')}}</button>
                    </a>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit">{{__('Выйти')}}</button>
                    </form>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

        <div class="blog-profile">

            <div class="content-left">
                <h1>{{__('Блог')}}</h1>
                <hr>

                @foreach($news as $oneNews)
                    <div class="blog-post">
                        <h3>{{__($oneNews->title)}}</h3>
                        <p>{{__($oneNews->description)}}</p>
                        <button onclick="{{route('news.show', $oneNews->id)}}">Далее</button>
                    </div>
                @endforeach


            </div>

            <div class="content-right">
                <h1>{{__('Мои рецепты')}}</h1>
                <hr>

                <div class="card-position">
                    @foreach($recipes as $recipe)
                        <a href="{{route('recipe.show', $recipe->id)}}">
                            <div class="card-resipt">
                                <img src="{{asset($recipe->image)}}" alt="">
                                <h1>{{__($recipe->title)}}</h1>
                                <p>{{__($recipe->category->name)}}</p>
                            </div>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </main>

@endsection
