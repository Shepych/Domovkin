@extends('layouts.main')

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
            <img class="slider__item" src="{{ $project->img }}" alt="">
            <div class="slider__pagination flex">
                @for($i = 0; $i < 6; $i++)
                    <div @if($i == 0) class="slider__pagination__active" @endif></div>
                @endfor
            </div>
        </section>
    </section>
@endsection
