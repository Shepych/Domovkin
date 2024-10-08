@extends('layouts.main')

@section('content')
    <section class="article__section__wrapper" style="padding-left: 0;padding-right: 0;max-width: 2200px;margin: 0 auto;margin-bottom: 40px;">
        <div class="article__page__wrapper">
            <section class="article__header">
                <h1 class="article__page__title">{{ $article->title }}</h1>
                <ul class="article__sub">
                    <li class="flex"><img src="/img/socials/date.svg" style="width:26px;margin-right:8px" alt="">{{ $article->created_at->diffForHumans() }}</li>
                    <li class="flex"><img src="/img/socials/eye.svg" style="width:29px;margin-right:8px" alt=""> Просмотров {{ $article->views }}</li>
                </ul>
{{--                <img style="display: block;margin: 0 auto;max-width: 800px;height: auto;border-radius: 20px;box-shadow: 0 0 5px black" src="{{ $article->poster() }}">--}}
                <div class="article__content">
                    {!! Str::markdown($article->content) !!}
                </div>

            </section>
            <img class="article__page__poster" src="{{ $article->poster() }}" alt="">
            
        </div>
    </section>

    @include('blocks.footer')
@endsection

@section('css')
    <link rel="stylesheet" href="/css/article.css">
@endsection
