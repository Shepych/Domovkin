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
                <img src="{{ "/img/homes/{$i}.jpeg" }}" style="width: 100%;border-bottom: 0.1vh solid #404549">
                <div class="project__price flex">5.000.000 р
                    <span style="color: white;font-size: 2vh;opacity: 0" class="flex">
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

{{--                <button class="button" style="height: 50px;margin-left: 24px;font-size: 2vh">Подробнее</button>--}}
            </div>
        @endfor
    </section>

    <div class="show__more">
        <button class="button">Посмотреть все объекты</button>
    </div>

    <section class="flex">
{{--        <section class="home__constructor">--}}
{{--            <h2 style="font-size: 3vh">Выберите параметры вашего будущего дома</h2>--}}
{{--            <div class="constructor__inputs">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--                <input type="text" class="input__text">--}}
{{--            </div>--}}
{{--        </section>--}}

        <section>
            <lottie-player src="/animations/home.json" background="Transparent" speed="0.5" style="width: 60vh;" direction="1" mode="normal" loop autoplay></lottie-player>
        </section>
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
            @for($i = 0; $i < 5; $i++)
                <div class="question__row" @if($i == 4) style="border-bottom: none" @endif>Сколько стоит проект дома ?</div>
            @endfor
        </div>
    </section>
@endsection
