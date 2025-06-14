@extends('layouts.base')
@section('title', 'Редактирование профиля')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('content')
    <main>
        <h1>Редактирование профиля</h1>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="form-group">
                <label for="name">Фотография:</label>
                <input type="file" id="photo" name="avatar">
            </div>
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Дата рождения:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}"
                       required>
            </div>

            @if (session('status') === 'profile-updated')
                <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Профиль успешно обновлен.') }}</p>
            @endif

            <button type="submit">Сохранить</button>
        </form>

        @include('profile.partials.update-password-form')

        <a href="{{ route('profile.index') }}">
            <button type="button">Назад</button>
        </a>
    </main>
@endsection
