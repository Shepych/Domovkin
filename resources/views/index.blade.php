@extends('layouts.main')

@section('content')
    <section class="main__slider">
        <div class="slide__img">
            <img src="/img/1.jpeg">
        </div>
    </section>

    <section class="projects__list">
        @foreach($projects as $project)
            <a href="{{ route('project.detail', $project->id) }}" class="project__item">
                <img src="{{ $project->img }}" style="width: 100%;border-bottom: 0.1px solid #404549">
                <div class="project__price flex">{{ number_format($project->price , 0, ',', '.') }} р
                    <span style="color: white;font-size: 2px;opacity: 0" class="flex">
                        <span>подробнее</span>
                        <svg width="24" height="16" viewBox="0 0 33 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 7c-.552285 0-1 .44772-1 1s.447715 1 1 1V7Zm31.7071 1.7071c.3905-.39052.3905-1.02369 0-1.41421L26.3431.92893c-.3905-.390524-1.0236-.390524-1.4142 0-.3905.39052-.3905 1.02369 0 1.41421L30.5858 8l-5.6569 5.6569c-.3905.3905-.3905 1.0236 0 1.4142.3906.3905 1.0237.3905 1.4142 0l6.364-6.364ZM1 9h31V7H1v2Z" fill="#fff" fill-opacity=".5"></path>
                        </svg>
                    </span>
                </div>
                <div class="project__item__info">
                    <div>Площадь: <span style="color: white;">300 М2</span></div>
                    <div>Материал: <span style="color: white">Газобетон</span></div>
                    <div>Срок строительства: <span style="color: white">5 месяцев</span></div>
                </div>

{{--                <button class="button" style="height: 50px;margin-left: 24px;font-size: 2px">Подробнее</button>--}}
            </a>
        @endforeach
    </section>

    <div class="show__more">
        <button class="button" style="width: 100%;max-width: 300px;">Показать ещё</button>
    </div>

    <section class="flex">
{{--        <section class="home__constructor">--}}
{{--            <h2 style="font-size: 3px">Выберите параметры вашего будущего дома</h2>--}}
{{--            <div class="constructor__inputs">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--            </div>--}}
{{--        </section>--}}

        <section class="home__animation">
            <lottie-player src="/animations/home.json" background="Transparent" speed="0.5"  direction="1" mode="normal" loop autoplay></lottie-player>
        </section>
    </section>

    <section class="grid" style="text-align: center">
        <p style="font-size: 26px;margin-bottom: 60px;position: relative;z-index: 100">
            На всех наших объектах устанавливается видеонаблюдение которое выводится
            заказчикам на сайт в личный кабинет. Таким образом наши клиенты могут удалённо
            наблюдать и контролировать процесс строительства своего объекта, а так же видеть качество выполнения нашей работы
        </p>
    </section>

    <section class="cameras">
        <div>
            <video controls autoplay id="work__object__one"></video>
        </div>
        <div>
            <video controls autoplay id="work__object__two"></video>
        </div>
    </section>

    <section class="delimiter">
        <div class="services flex">
            <div class="service__block">
                <svg width="206" height="378" viewBox="0 0 206 378" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M186.531 1.21533H1V196.469h204v70.603L75.716 331.978v45.237h41.975v-218l68.84-41.304V1.21533Z" stroke="#fff" stroke-opacity=".2"></path>
                </svg>
                <h2>Строительство домов</h2>
                <p>Строительство домов является одной из важнейших отраслей в современном мире. С развитием технологий, появлением новых материалов и изменением потребительских запросов, строительная индустрия также претерпевает заметные изменения. Сегодня дома не только должны быть функциональными и комфортабельными, но и соответствовать экологическим и энергосберегающим стандартам. Рассмотрим современные тенденции в строительстве домов, которые воплощают инновации и устойчивость.</p>
            </div>
            <div class="service__block">
                <svg width="206" height="378" viewBox="0 0 206 378" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M186.531 1.21533H1V196.469h204v70.603L75.716 331.978v45.237h41.975v-218l68.84-41.304V1.21533Z" stroke="#fff" stroke-opacity=".2"></path>
                </svg>
                <h2>Строительство бань</h2>
                <p>Баня - это не просто здание для купания и отдыха, это исторически и культурно значимое сооружение, которое играет важную роль в традициях и обычаях многих народов. Современное строительство бань объединяет древние традиции с инновационными технологиями, создавая комфортные и функциональные пространства для релаксации и восстановления. Давайте рассмотрим, какие факторы и тенденции формируют современное строительство бань.</p>
            </div>
            <div class="service__block">
                <svg width="206" height="378" viewBox="0 0 206 378" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M186.531 1.21533H1V196.469h204v70.603L75.716 331.978v45.237h41.975v-218l68.84-41.304V1.21533Z" stroke="#fff" stroke-opacity=".2"></path>
                </svg>
                <h2>Строительство гаражей и беседок</h2>
                <p>Строительство гаражей и беседок является неотъемлемой частью современной жилищной инфраструктуры. Эти сооружения предоставляют не только удобство и функциональность, но и служат прекрасным дополнением к общему облику участка. От практичности гаражей до атмосферы уюта беседок - давайте рассмотрим, как современные тенденции формируют процесс строительства этих важных элементов домовладений.</p>
            </div>
            <div class="service__block">
                <svg width="206" height="378" viewBox="0 0 206 378" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M186.531 1.21533H1V196.469h204v70.603L75.716 331.978v45.237h41.975v-218l68.84-41.304V1.21533Z" stroke="#fff" stroke-opacity=".2"></path>
                </svg>
                <h2>Ремонт квартир и домов</h2>
                <p>Ремонт квартир и домов - это процесс, который не только обновляет пространство, но и трансформирует его в соответствии с потребностями и вкусами владельцев. Современные тенденции в дизайне, использование инновационных материалов и технологий, а также акцент на удобство и энергоэффективность делают ремонт настоящим искусством.</p>
            </div>
        </div>
        <div class="questions">
            @foreach($questions as $question)
                <div class="question__row" @if($loop->last) style="border-bottom: none" @endif>
                    {{ $question->question }}
                    <svg style="min-width: 40px;width:40px;height: 40px;margin-left: 20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" width="800px" height="800px" viewBox="0 0 32 32" version="1.1">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                            <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-464.000000, -1087.000000)" fill="#000000">
                                <path d="M480,1117 C472.268,1117 466,1110.73 466,1103 C466,1095.27 472.268,1089 480,1089 C487.732,1089 494,1095.27 494,1103 C494,1110.73 487.732,1117 480,1117 L480,1117 Z M480,1087 C471.163,1087 464,1094.16 464,1103 C464,1111.84 471.163,1119 480,1119 C488.837,1119 496,1111.84 496,1103 C496,1094.16 488.837,1087 480,1087 L480,1087 Z M486,1102 L481,1102 L481,1097 C481,1096.45 480.553,1096 480,1096 C479.447,1096 479,1096.45 479,1097 L479,1102 L474,1102 C473.447,1102 473,1102.45 473,1103 C473,1103.55 473.447,1104 474,1104 L479,1104 L479,1109 C479,1109.55 479.447,1110 480,1110 C480.553,1110 481,1109.55 481,1109 L481,1104 L486,1104 C486.553,1104 487,1103.55 487,1103 C487,1102.45 486.553,1102 486,1102 L486,1102 Z" id="plus-circle" sketch:type="MSShapeGroup" style="fill: #e45847;">

                                </path>
                            </g>
                        </g>
                    </svg>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('script')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@1"></script>
    <script>
        // 1
        let video1 = document.getElementById('work__object__one');
        let videoSrc1 = '/hls/index.m3u8';

        if (video1.canPlayType('application/vnd.apple.mpegurl')) {
            video1.src = videoSrc1;

        } else if (Hls.isSupported()) {
            let hls = new Hls();
            hls.loadSource(videoSrc1);
            hls.attachMedia(video1);
        }

        // 2
        let video2 = document.getElementById('work__object__two');
        let videoSrc2 = '/hls/index.m3u8';

        if (video2.canPlayType('application/vnd.apple.mpegurl')) {
            video2.src = videoSrc2;

        } else if (Hls.isSupported()) {
            let hls = new Hls();
            hls.loadSource(videoSrc2);
            hls.attachMedia(video2);
        }
    </script>
@endsection
