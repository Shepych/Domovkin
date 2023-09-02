<header>
    <section class="grid flex main__header__row" style="height: 100px">
        <div id="nav-icon1" class="menu__burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <a class="logo" href="/">DOMOVKIN<span style="color: #e45847">.RU</span></a>
        <span style="color: white;" class="phone">8 (812) 900 08 40</span>
        <button class="button" style="height: 50px;margin-left: 24px;">Заказать звонок</button>
        <svg style="margin-left: 24px;" width="30" height="40" viewBox="0 0 16 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.91992 0c-2.4821 0-4.5 2.02002-4.5 4.50474 0 2.4373 1.90421 4.40991 4.38632 4.49526.07579-.00948.15158-.00948.20842 0H8.08097c2.42523-.08535 4.32943-2.05796 4.33893-4.49526C12.4199 2.02002 10.402 0 7.91992 0ZM13.635 13.919c-3.1387-2.0925-8.2575-2.0925-11.41875 0C.7875 14.8752 0 16.169 0 17.5527c0 1.3838.7875 2.6663 2.205 3.6113 1.575 1.0575 3.645 1.5862 5.715 1.5862s4.14-.5287 5.715-1.5862c1.4175-.9563 2.205-2.2388 2.205-3.6338-.0112-1.3837-.7875-2.6662-2.205-3.6112Z" fill="#E45847"></path>
        </svg>
    </section>

    <section class="flex header__menu">
        <span class="lozung">Строительство коттеджей, бань, гаражей и беседок под ключ. Ремонт квартир и домов</span>
    </section>
    <section class="main__menu">
        <ul>
            <li><a href="{{ route('articles') }}">Статьи</a></li>
            <li><a href="{{ route('index') }}">Объекты</a></li>
            <li>Услуги</li>
            <li>Отзывы</li>
        </ul>
    </section>
</header>
