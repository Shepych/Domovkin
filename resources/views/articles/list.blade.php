@extends('layouts.main')

@section('content')
    <section class="articles__list">
        @foreach($articles as $article)
            <a class="article__row" href="{{ route('articles.detail', $article->slug) }}">
                <img src="{{ $article->img }}" alt="">
                {{ $article->title }}
            </a>
        @endforeach
    </section>
@endsection
