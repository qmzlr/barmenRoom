@extends('layouts.guest')

@section('title', 'Регистрация')
@section('css')
   <link rel="stylesheet" href="{{asset('css/form.css')}}">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
   <form class="center" method="POST" action="{{ route('register') }}">
      @csrf
      <h1>Регистрация</h1>
      <div>
         <input id="email" type="email" name="email" value="{{old('email')}}" required
                autofocus autocomplete="email" placeholder="Email"/>
         <x-input-error :messages="$errors->get('email')" class=""/>
      </div>
      <div>
         <input id="name" type="text" name="name" value="{{old('name')}}" required
                autofocus autocomplete="name" placeholder="ФИО"/>
         <x-input-error :messages="$errors->get('name')" class=""/>
      </div>

      <div>
         <input id="phone" type="tel" name="phone" value="{{old('phone')}}" required
                autofocus autocomplete="phone" placeholder="Номер телефон"/>
         <x-input-error :messages="$errors->get('phone')" class=""/>
      </div>
      <div>
         <input id="date_of_birth" type="date" name="date_of_birth" value="{{old('date_of_birth')}}" required
                autofocus autocomplete="date_of_birth" placeholder="Дата рождения"/>
         <x-input-error :messages="$errors->get('date_of_birth')" class=""/>
      </div>

      <div>
         <input id="password"
                type="password"
                name="password"
                required autocomplete="new-password" placeholder="Пароль"/>

         <x-input-error :messages="$errors->get('password')" class=""/>
      </div>

      <!-- Confirm Password -->
      <div>

         <input id="password_confirmation"
                type="password"
                name="password_confirmation" required autocomplete="new-password"
                placeholder="Повторите пароль"/>

         <x-input-error :messages="$errors->get('password_confirmation')" class=""/>
      </div>

      <button>Регистрация</button>
      <p>Продолжая, вы соглашаетесь с положениями основных документов BarmanRoom — Условия предоставления услуг и
         Политика конфиденциальности — и подтверждаете, что прочли их.</p>

      <a href="{{route('login')}}">Уже зарегестрированны?<span> Войти</span> </a>
   </form>

@endsection


