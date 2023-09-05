@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<link rel="stylesheet" href="/css/slider.css">
@endsection

@section('content')
    <section class="black__ground">
        <section class="grid flex" style="padding-top: 40px;align-items: stretch;">
            <div class="project__left__column">
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
                        <div class="swiper-slide">
                            <img src="/img/articles/4.webp">
                        </div>
                    </div>
                </div>
                <div class="swiper2" style="margin-top: 10px">
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
                        <div class="swiper-slide">
                            <img src="/img/articles/4.webp">
                        </div>
                    </div>
                </div>
            </div>
            <div class="project__right__column" style="align-items: stretch;">
                <div class="project__page__price flex">
                    <span style="opacity: 0.86;">{{ number_format($project->price, 0, '.', '.')  }} р</span>
                </div>

                <div class="project__characteristics">
                    <div class="flex" style="flex-direction: column">
                        <div>Материал: Газобетон</div>
                        <div>Площадь: <span style="flex-direction: row;margin-left: 10px">300 м<sup>&sup2;</sup></span></div>
                        <div>Этажность: 2</div>
                        <div>Потребление: 15 кВт</div>
                        <div>Форма кровли: Плоская</div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    @php
    $txt = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,';
    @endphp
    <div class="grid">
        <h2 style="text-align: center;font-family: Grotesk;margin: 20px 40px 40px 40px;font-size: 32px">Технические характеристики</h2>
        <p style="font-size: 24px;font-family: Euclid;margin-bottom: 40px">{{ $txt }}</p>

        <h2 style="text-align: center;font-family: Grotesk; margin: 20px 40px 40px 40px;font-size: 32px">Архитектурные характеристики</h2>
        <p style="font-size: 24px;font-family: Euclid;margin-bottom: 40px">{{ $txt }}</p>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="/js/slider.js"></script>
@endsection
