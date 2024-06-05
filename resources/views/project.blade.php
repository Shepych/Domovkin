@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<link rel="stylesheet" href="/css/slider.css">
@endsection

@section('content')
    <section style="max-width: 2200px;margin: 0 auto">
            <section class="flex main__slider__wrapper">
                <div class="project__left__column">
                    <div class="swiper">
                        <div class="swiper-wrapper" style="align-items: stretch;">
                            <div class="swiper-slide">
                                <img src="{{ $project->img }}">
                            </div>
                            @foreach($project->photos() as $photo)
                            <div class="swiper-slide">
                                <img src="{{ $photo->src }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <section class="swiper__mobile">
                    <div class="swiper2 hidden" id="delayed-block2" style="padding-left: 40px;padding-right: 40px;">
                        <div class="swiper-wrapper gallery">
                            <div class="swiper-slide">
                                <img src="{{ $project->img }}">
                            </div>
                            @foreach($project->photos() as $photo)
                            <div class="swiper-slide">
                                <img src="{{ $photo->src }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <div class="project__right__column" style="align-items: stretch;">
                    <div class="project__characteristics">
                        <div class="flex project-info__section">
                            <div class="project__price-gray-wrapper">
                                <span class="project__page__price" style="opacity: 0.86;">{{ number_format($project->price, 0, '.', '.')  }}</span>
                            </div>
                            
                            <div class="flex" style="flex-direction: column;justify-content:space-evenly">
                                <span>
                                    <span class="project__gray__span">Материал:</span> {{ $project->material() }}
                                </span>
                                <span>
                                    <span class="project__gray__span">Площадь:</span> <span style="flex-direction: row;margin-left: 10px">{{ $project->square }} м<sup>&sup2;</sup></span>

                                </span>
                                <span>
                                    <span class="project__gray__span">Этажность:</span> {{ $project->floors }}

                                </span>
                                <span>
                                    <span class="project__gray__span">Потребление:</span> {{ $project->power }} кВт

                                </span>
                                <span>
                                    <span class="project__gray__span">Форма кровли:</span> {{ $project->roof() }}

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="swiper__mobile-hidden" style="padding: 0;padding-top:40px;padding-bottom:35px;overflow:hidden">
                <div class="swiper3 hidden" id="delayed-block" style="padding-left: 40px;padding-right: 40px;">
                    <div class="swiper-wrapper gallery">
                        <div class="swiper-slide">
                            <img src="{{ $project->img }}">
                        </div>

                        @foreach($project->photos() as $photo)
                        <div class="swiper-slide">
                            <img src="{{ $photo->src }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
    </section>

    @php
    $txt = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,';
    @endphp
    <div class="" style="max-width:2200px;margin:0 auto;padding-left: 40px;padding-right: 40px;">
{{--        <h2 style="text-align: center;font-family: Grotesk; margin: 40px 40px 40px 40px;font-size: 32px">Описание</h2>--}}
        {!! $project->description !!}
{{--        <button class="button gray__button" style="width: 350px;height: 70px;margin: 0 auto;margin-bottom: 20px;margin-top: 90px; background: #404549;font-size: 24px">Скачать план</button>--}}
        {{-- <div class="flex project__footer">
            <img src="/img/homes/Слой 1.png">
        </div> --}}
    </div>

    @include('blocks.footer')
@endsection

@section('js')
<script src="/js/swiper.js"></script>
<script src="/js/slider.js"></script>
<script>
    $(".gallery .swiper-slide").hover(function() {
        $(".gallery .swiper-slide").css('opacity', '0.5')
        $(this).css('opacity', '1')
    }, function(){
        $(".gallery .swiper-slide").css('opacity', '1')
    });
</script>
@endsection
