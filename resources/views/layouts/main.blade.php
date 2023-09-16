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
<body class="load ajax__wrap">
    @include('blocks.header')

    @yield('content')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        // Главное меню гамбургер
        $(document).ready(function(){
            $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
                $(this).toggleClass('open')
                $('.main__menu').toggleClass('main__menu__open')
            });
            $("body").removeClass("load")



            // Ajax форма
            $('.ajax__wrap').on('submit', '.ajax__form', function (event) {
                event.preventDefault()
                // Если валидация не проходит - то анимируем, иначе - аякс
                let name = $("#swal-input1")
                let phone = $("#swal-input-phone")

                // if(name.val().length < 3) {
                //     name.css('border', '1px solid red')
                //     alert(phone.val().length)
                // } else {
                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Ожидайте, наш специалист скоро свяжется с вами!',
                                html: '<div style="margin-bottom:10px"></div>',
                                showConfirmButton: false
                            })
                        }
                    })
                // }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
    </script>
    @yield('js')
</body>
</html>
