<header>
    <section class="grid flex main__header__row" style="height: 170px !important;justify-content:center;flex-direction:column">
        <div class="flex" style="width:100%;gap:30px">
            <img class="icon__brick" src="/img/brick.svg" width="50px" height="90px" style="margin-right: 24px">
            <a class="logo"  href="/">DOMOVKIN<span class="logo__ru" style="color: #126eff">.RU</span></a>
           
            <svg class="phone__icon-wrapper" viewBox="0 0 24 24">
                <use href="/img/svg/phone.svg#phone">
            </svg>

            <span style="color: white;display: block;width: 176px;text-align: center" class="phone">8 (812) 900 08 40</span>
            
            <button class="button" id="application__call" style="height: 50px;margin-left: 22px;">Заказать звонок</button>
            <a class="user__icon" style="margin-left: 24px;margin-top: 6px;" href="{{ route('login') }}">
                <svg width="30" height="40" viewBox="0 0 16 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.91992 0c-2.4821 0-4.5 2.02002-4.5 4.50474 0 2.4373 1.90421 4.40991 4.38632 4.49526.07579-.00948.15158-.00948.20842 0H8.08097c2.42523-.08535 4.32943-2.05796 4.33893-4.49526C12.4199 2.02002 10.402 0 7.91992 0ZM13.635 13.919c-3.1387-2.0925-8.2575-2.0925-11.41875 0C.7875 14.8752 0 16.169 0 17.5527c0 1.3838.7875 2.6663 2.205 3.6113 1.575 1.0575 3.645 1.5862 5.715 1.5862s4.14-.5287 5.715-1.5862c1.4175-.9563 2.205-2.2388 2.205-3.6338-.0112-1.3837-.7875-2.6662-2.205-3.6112Z" fill="#126eff"></path>
                </svg>
            </a>
        </div>
        <span class="lozung" style="color:white;margin-top:22px">Строительство домов, ремонт квартир в Москве и Московской области</span>
    </section>
    
    <!-- <div id="nav-icon1" class="menu__burger">
        <span></span>
        <span></span>
        <span></span>
    </div> -->

    <section class="main__menu main__menu__open">
        <ul class="flex main__menu-list">
            <li class="flex {{ request()->is('projects/*') || request()->is('projects') ? 'main__menu__active' : null }}">
                <a class="flex" href="{{ route('projects') }}">
                    <img class="main__menu-item-img" src="/img/socials/house2.svg" style="width: 45px;margin-right: 20px">
                    <span>Проекты</span>
                </a>
            </li>
            <li class="flex {{ request()->is('articles/*') || request()->is('articles') ? 'main__menu__active' : null }}">
                <a class="flex" href="{{ route('articles') }}">
                    <img class="main__menu-item-img" src="/img/socials/news.svg" style="width: 45px;margin-right: 20px">
                    <span>Статьи</span>
                </a>
            </li>
            <li class="flex {{ request()->is('services') ? 'main__menu__active' : null }}">
                <a class="flex" href="{{ route('services') }}">
                    <img class="main__menu-item-img" src="/img/socials/pig.svg" style="width: 48px;margin-right: 20px">
                    <span>Услуги</span>
                </a>
            </li>
            {{-- <li class="flex {{ request()->is('reviews') ? 'main__menu__active' : null }}">
                <a class="flex" href="{{ route('reviews') }}">
                    <img src="/img/socials/reviews2.svg" style="width: 45px;margin-right: 20px">
                    <span>Отзывы</span>
                </a>
            </li> --}}
{{--            <li class="flex">Отзывы</li>--}}
        </ul>
    </section>
</header>
