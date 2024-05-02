<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/hamburger.css">
    <link rel="icon" type="image/x-icon" href="/img/domicon.png">
    <title>Строительство домов</title>
    @yield('css')
</head>
<body class="load ajax__wrap">
    @include('blocks.header')

    @yield('content')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        // Главное меню гамбургер
        // $(document).ready(function(){
        //     $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
        //         $(this).toggleClass('open')
        //         $('.main__menu').toggleClass('main__menu__open')
        //     });
        //     $("body").removeClass("load")
        // });
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script>
        let csrf = '@csrf';
        function application() { // Заявка
            Swal.fire({
                html:
                    '<h2 style="font-family: Euclid;margin-bottom:20px;margin-top:10px">Обратный звонок</h2>' +
                    '<form class="flex ajax__form" style="flex-direction:column;padding-bottom:16px" action="{{ route('client.application') }}" method="post">' +
                        csrf +
                        '<input placeholder="Как к вам обращаться" style="font-family: Euclid;width:calc(100% - 10px);margin-top:10px;margin-bottom:26px;background-color:#F8F8F8" id="swal-input1" type="text" class="swal2-input">' +
                        '<input placeholder="Телефон" style="font-family: Euclid;width:calc(100% - 10px);margin-top:0;margin-bottom:26px;background-color:#F8F8F8" id="swal-input-phone" class="swal2-input">' +
                        '<textarea style="font-family: Euclid; width:calc(100% - 10px);resize:none;margin-bottom:25px;margin-top:0;background-color:#F8F8F8" placeholder="Опишите вашу ситуацию, проблему или вопрос" class="swal2-textarea"></textarea>' +
                        '<input type="submit" class="button button__sweet" value="Отправить заявку">' +
                    '</form>',
                showConfirmButton: false,
            })
            $('.swal2-popup').css('border-radius', '10px')

            $(document).ready(function() {
                $('#swal-input-phone').inputmask("+7 (999) 999-99-99");
            });
        }
    </script> --}}

    <script>
        let csrf = '@csrf';
        let backCallRoute = '{{ route("client.application") }}';
    </script>
    @yield('js')
</body>
</html>
