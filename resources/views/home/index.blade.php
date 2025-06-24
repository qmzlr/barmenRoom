@extends('layouts.base')
@section('title', 'Barmen Room')
@section('content')
    <main>
        <div class="content-first">
            <div class="content-text">
                <h1>{{__('BarMen Room')}}</h1>

                <p>{{__('Место для обмена рецептами, обсуждения трендов и советов в барном деле. Публикуйте коктейли,
                    классические
                    миксы, эксперименты с ингредиентами, задавайте вопросы по работе, делитесь лайфхаками по инвентарю и
                    оформлению. Здесь можно найти вдохновение, получить фидбек и быть в курсе трендов.
                    Присоединяйтесь!')}}</p>

                <button>{{__('Узнать больше')}}</button>

            </div>

            <div class="content-img">
                <div class="jj98989">
                    <img src="{{asset('photo/2.jpg')}}" alt="">
                </div>

                <div class="hh99111">
                    <img src="{{asset('photo/3.jpg')}}" alt="">
                    <img src="{{asset('photo/1.jpg')}}" alt="">
                </div>
            </div>
        </div>

        <div class="trans">
            <div class="button-trans">
                <h1>Тренды недели</h1>
                <a href="{{route('catalog')}}">
                    <button>Еще</button>
                </a>
            </div>

            <div class="card-position">
                @foreach ($popularRecipes as $popularRecipe)
                    <a href="{{route('recipe.show', $popularRecipe->id)}}">
                        <div class="card-resipt">
                            <img src="{{asset($popularRecipe->image)}}" alt="">
                            <h1>{{__($popularRecipe->title)}}</h1>
                            <p>{{__($popularRecipe->category->name)}}</p>
                        </div>
                    </a>

                @endforeach
            </div>
        </div>


        <div class="blog">

            <div class="header-blog">
                <h1>Новости</h1>
                <button>Еще</button>
            </div>

            <div class="news">
                <a href="{{route('news.show', $news[0]->id)}}">
                    <div class="big-news">
                        <img src="{{asset($news[0]->image)}}" alt="">
                        <h1>{{__($news[0]->title)}}</h1>
                        <p>{{__($news[0]->discription)}}</p>
                        <h3>{{__($news[0]->author)}}</h3>
                    </div>
                </a>
                <div class="small-news">
                    @foreach($news as $oneNews)
                        @if($loop->iteration != 1)
                            <a href="{{route('news.show' , $oneNews->id)}}">
                                <div class="css-small-news">
                                    <img src="{{asset($oneNews->image)}}" alt="">
                                    <div class="hhh009933">
                                        <div>
                                            <h1>{{__($oneNews->title)}}</h1>
                                            <p>{{__($oneNews->discription)}}</p>
                                        </div>

                                        <div class="footer-small-news">
                                            <h3>{{__($oneNews->author)}}</h3>
                                            <a href="">
                                                <button onclick="{{route('news.show', $oneNews->id)}}">Далее</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mailing">

            <div id="Input-content">
                <p>Подпишитесь на рассилки от <span id="Logo">{{config()->get('app.name')}}</span></p>
                <input type="text" value="" placeholder="Email...">
            </div>

            <img src="{{asset('photo/bartender-coctails.svg')}}" alt="">
        </div>
@endsection
