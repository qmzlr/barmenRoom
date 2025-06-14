@extends('layouts.base')
@section('title', 'Рецепт')
@section('css')
   <link rel="stylesheet" href="{{ asset('css/css-recipe.css') }}">
@endsection
@section('content')
   <main>
      <h1>{{ $recipe->title }}</h1>

      <div class="resipt">
         <img src="{{$recipe->image}}" alt="">

         <div class="info-resipt">
            <h2>{{__('Ингридиенты:')}}</h2>

            <div id="gap">
               @foreach($recipe->ingredients as $ingredient)
                  <div class="ingredients">
                     <p class="name-ingredient">{{__($ingredient->name)}}</p>
                     <hr>
                     <p Class="quantity-ingredient">{{__($ingredient->quantity . ' ' . $ingredient->unit)}}</p>
                  </div>
               @endforeach
            </div>
            <h2>{{__('Примечание:')}}</h2>
            <p>{{__($recipe->description)}}</p>
         </div>
      </div>
   </main>
@endsection
