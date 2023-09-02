@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<link rel="stylesheet" href="/css/slider.css">
@endsection

@section('content')
    <section class="black__ground">
        <section class="grid">
            <div class="project__header">
                <div class="project__name">
                    <div>
                        <span>ПРОЕКТЫ <span>> {{ strtoupper($project->name) }}</span></span><br>
                        <h1>{{ strtoupper($project->name) }}</h1>
                    </div>
                    <div class="project__page__price">
                        {{ number_format($project->price, 0, '.', '.')  }} р
                    </div>
                </div>

                <div class="project__subheader">
                    <span><span style="margin-right: 20px">ОБЩАЯ ПЛОЩАДЬ:</span> <span class="bold" style="flex-direction: row">300 М<sup>&sup2;</sup></span></span>
                    <span style="text-align: right"><span class="fix__right__margin">МАТЕРИАЛ:</span> <span class="bold" >ГАЗОБЕТОН</span></span>
                </div>
            </div>

            {{-- Слайдер --}}
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="{{ $project->img }}">
                    </div>
                    <div class="swiper-slide">
                        <img src="/img/articles/2.webp">
                    </div>
                    <div class="swiper-slide">
                        <img src="/img/articles/3.webp">
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
    </section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="/js/slider.js"></script>
@endsection
