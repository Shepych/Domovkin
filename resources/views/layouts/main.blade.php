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
    <script>
        // Главное меню гамбургер
        $(document).ready(function(){
            $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
                $(this).toggleClass('open')
                $('.main__menu').toggleClass('main__menu__open')
            });
        });
    </script>
    @yield('js')
</body>
</html>
