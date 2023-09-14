<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/hamburger.css">
    <title>Строительство домов</title>
    @yield('css')
</head>
<body>
    @include('blocks.header')

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        // Главное меню гамбургер
        $(document).ready(function(){
            $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
                $(this).toggleClass('open')
                $('.main__menu').toggleClass('main__menu__open')
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let csrf = '@csrf';
        function application() { // Заявка
            Swal.fire({
                title: 'Заказать звонок',
                html:
                    '<form class="flex" style="flex-direction:column" action="{{ route('client.application') }}" method="post">' +
                        csrf +
                        '<input placeholder="Имя" style="width:calc(100% - 10px);margin-top:10px;margin-bottom:26px" id="swal-input1" type="text" class="swal2-input">' +
                        '<input placeholder="Телефон" style="width:calc(100% - 10px);margin-top:0;margin-bottom:26px" id="swal-input-phone" class="swal2-input">' +
                        '<textarea style="width:calc(100% - 10px);resize:none;margin-bottom:25px;margin-top:0" placeholder="Комментарий" class="swal2-textarea"></textarea>' +
                        '<input type="submit" class="button">' +
                    '</form>',
                text: 'Do you want to continue',
                showConfirmButton: false
            })
            $('.swal2-popup').css('border-radius', '10px')

            $(document).ready(function() {
                $('#swal-input-phone').inputmask("+7 (999) 999-99-99");
            });
        }
    </script>
    @yield('js')
</body>
</html>
