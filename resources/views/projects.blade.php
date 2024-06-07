@extends('layouts.main')

@section('style')
<link rel="stylesheet" href="/css/hamburger.css">
@endsection



@section('content')
    <section class="projects__list">
        @foreach($projects as $project)
            <a href="{{ route('project.detail', $project->id) }}" class="project__item">
                <div class="project__img__wrapper">
                    <img src="{{ $project->img }}" style="width: 100%;border-bottom: 0.1px solid #404549">
                </div>
                <div class="project__price flex">{{ number_format($project->price , 0, ',', '.') }} р 
                    {{-- <div class="project__additional__info flex">
                        <img src="/img/power.svg" width="30px" alt=""> <span style="font-size: 18px">{{ $project->power }} кВт</span>
                    </div> --}}
                    {{-- <span style="color: white;font-size: 2px;opacity: 0" class="flex">
                        <span>подробнее</span>
                        <svg width="24" height="16" viewBox="0 0 33 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 7c-.552285 0-1 .44772-1 1s.447715 1 1 1V7Zm31.7071 1.7071c.3905-.39052.3905-1.02369 0-1.41421L26.3431.92893c-.3905-.390524-1.0236-.390524-1.4142 0-.3905.39052-.3905 1.02369 0 1.41421L30.5858 8l-5.6569 5.6569c-.3905.3905-.3905 1.0236 0 1.4142.3906.3905 1.0237.3905 1.4142 0l6.364-6.364ZM1 9h31V7H1v2Z" fill="#fff" fill-opacity=".5"></path>
                        </svg>
                    </span> --}}
                </div>
                
                <div class="project__item__info" style="padding-bottom: 20px">
                    <div>Площадь: <span style="color: white;">{{ $project->square }} М2</span></div>
                    <div>Материал: <span style="color: white">{{ $project->material() }}</span></div>
                    <div>Срок строительства: <span style="color: white">{{ $project->term }} месяцев</span></div>
                    <div style="border-bottom: none">Потребление: 
                        <div class="project__additional__info flex" style="border-bottom: none;margin-left: auto">
                            <span style="font-size: 18px">{{ $project->power }} кВт</span> <img src="/img/power.svg" width="22px" style="margin-left:3px"> 
                        </div>
                </div>
                </div>
            </a>
        @endforeach
    </section>

    <p class="projects__paragraph">В базе сайта представлено немного домов, но мы можем реализовать почти любой ваш проект, задумку или желание по чертежам или просто по фотографии понравившегося домика (чертежи составим сами).</p>

    <section class="delimiter">
        @include('blocks.footer')
    </section>
@endsection

@section('js')
{{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> --}}
@endsection
