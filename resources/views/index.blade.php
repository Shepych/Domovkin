@extends('layouts.main')

@section('content')
    <section class="main__slider">
        <div class="slide__img">
            <img src="/img/1.jpeg">
        </div>
    </section>

    <section class="projects__list">
        @for($i = 0; $i < 12; $i++)
            <div class="project__item">
                <img src="{{ "/img/homes/{$i}.jpeg" }}" style="width: 100%">
            </div>
        @endfor
    </section>

    <div class="show__more">
        Посмотреть все объекты
    </div>

    <section class="flex">
        <section class="home__constructor">
            <h2 style="font-size: 3vh">Выберите параметры вашего будущего дома</h2>
            <div class="constructor__inputs">
                <input type="text" class="input__text">
                <input type="text" class="input__text">
                <input type="text" class="input__text">
                <input type="text" class="input__text">
                <input type="text" class="input__text">
                <input type="text" class="input__text">
            </div>
        </section>

        <section>
            <lottie-player src="/animations/home.json" background="Transparent" speed="0.5" style="width: 80vh;" direction="1" mode="normal" loop autoplay></lottie-player>
        </section>
    </section>

    <section class="delimiter">
        <div class="services flex">
            <div class="service__block"></div>
            <div class="service__block"></div>
            <div class="service__block"></div>
            <div class="service__block"></div>
        </div>
        <div class="questions">
            @for($i = 0; $i < 5; $i++)
                <div class="question__row" @if($i == 4) style="border-bottom: none" @endif>Сколько стоит проект дома ?</div>
            @endfor
        </div>
    </section>
@endsection
