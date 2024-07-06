@extends('layouts.main')

@section('content')
    <section class="articles__list">
        @foreach($articles as $article)
            <a class="article__row" href="{{ route('articles.detail', $article->slug) }}">
                <div class="article__img__wrap">
                    <img src="{{ $article->poster() }}" style="width: 100%" alt="">
                </div>
                <h2>
                    {{ mb_strtoupper($article->title) }}
                </h2>
                <div class="article__description">
                    <p>
                        {{ mb_strimwidth($article->description, 0, 170, " ...") }}
                    </p>
                </div>
                <div class="article__footer">
                    <span class="article__date" style="display: flex;justify-content: center;align-items: center; color: #262626;font-size: 20px;font-family: Roboto">ПОДРОБНЕЕ <span style="margin-left: 10px !important;box-sizing: border-box; display: block; background-image: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img style="width:10px;transform: rotateY(180deg)" alt="" aria-hidden="true" src="https://page.lfl.ru/_next/static/media/buttonArrow.f548b8f7.svg" style="display: block; max-width: 100%; background-image: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span></span>
                    <span class="article__date" style="margin-right: 18px">{{ Carbon\Carbon::parse($article->created_at)->diffForHumans(); }}</span>
                    <span class="article__date article__date__adaptive" style="margin-right: 18px">{{ Carbon\Carbon::parse($article->created_at)->format('d.m.Y') }}</span>
                </div>
            </a>
        @endforeach
    </section>

    @include('blocks.footer')
@endsection
