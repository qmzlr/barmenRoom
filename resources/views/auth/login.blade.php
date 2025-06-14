@extends('layouts.guest')

@section('title', 'Вход')
@section('css')
   <link rel="stylesheet" href="{{asset('css/form.css')}}">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection

@section('content')
   <form class="center" method="POST" action="{{ route('login') }}">
      <h1>{{__('Авторизация')}}</h1>
      @csrf

      <!-- Email Address -->
      <div>
         <input id="email" class="block" type="email" name="email" value="{{old('email')}}" required
                autofocus autocomplete="username" placeholder="Email"/>
         <x-input-error :messages="$errors->get('email')" class="mt-2"/>
      </div>

      <!-- Password -->
      <div class="mt-4">
         <input id="password" class="block"
                type="password"
                name="password"
                required autocomplete="current-password" placeholder="Пароль"/>

         <x-input-error :messages="$errors->get('password')" class="mt-2"/>
      </div>

      <!-- Remember Me -->
      <div class="flex items-center justify-end mt-4">
         <input id="remember_me" type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                style="width: 16px; height: 16px" name="remember">
         <span class="ml-2" style="width: auto">{{ __('Remember me') }}</span>
      </div>


      <button type="submit">{{__('Авторизация')}}</button>
      <p>{{__('Продолжая, вы соглашаетесь с положениями основных документов BarmanRoom — Условия предоставления услуг и
         Политика конфиденциальности — и подтверждаете, что прочли их.')}}</p>

      <a href="{{route('register')}}">{{__('Нету аккаунта?')}}<span>{{__(' Зарегестрироваться')}}</span> </a>

      <a href="{{route('home')}}" style="margin-top: 20px; color: red;">{{__('Назад')}}</a>
   </form>

@endsection
