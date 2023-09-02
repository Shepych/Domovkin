@extends('layouts.main')

@section('content')
    <section class="article__page">
        <h1>{{ $article->title }}</h1>
        <img src="{{ $article->img }}" alt="">
    </section>
@endsection
