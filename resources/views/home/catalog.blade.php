@php use Illuminate\Http\Request; @endphp
@extends('layouts.base')
@section('title', 'Каталог')
@section('css')
   <link rel="stylesheet" href="{{ asset('css/catalog-css.css') }}">
@endsection
@section('content')
   <main>
      <div class="first-catalog">
         <h1>{{__('Фильтры')}}</h1>
         <input type="text" placeholder="Поиск">
      </div>

      <form class="filter" action="{{route('catalog')}}">
         <div class="vibor">
            <div class="select">
               <label for="">Вид напитка</label>
               <select name="category">
                  <option value="all">Все</option>
                  @foreach($categories as $category)
                     <option value="{{$category->name}}"
                             @if(\request()->input('category') == $category->name) selected @endif>{{$category->name}}</option>
                  @endforeach
               </select>
            </div>

            <div class="select">
               <label for="">Объем</label>
               <select>
                  <option value="">0.3 мл</option>
                  <option value="">0.5 мл</option>
                  <option value="">1 л</option>
               </select>
            </div>
         </div>


         <div class="button">
            <button type="submit">Применить</button>
            <a href="{{url()->current()}}">
               <button type="button">Сбросить фильтры</button>
            </a>
         </div>
      </form>

      <div class="card-position">
         @foreach ($recipes as $recipe)
            <a href="{{route('recipe.show', $recipe->id)}}">
               <div class="card-resipt">
                  <img src="{{asset($recipe->image)}}" alt="">
                  <h1>{{__($recipe->title)}}</h1>
                  <p>{{__($recipe->category->name)}}</p>
               </div>
            </a>
         @endforeach
      </div>
   </main>
@endsection
