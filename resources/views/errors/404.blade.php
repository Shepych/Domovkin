<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница не найдена</title>
    <link rel="stylesheet" href="./css/404.css">
    <link rel="icon" type="image/x-icon" href="/favicon.png">
</head>
<body>
    <div class="logo__error-page">
        <img class="icon__brick" src="/img/brick.svg" width="50px" height="90px" style="margin-right: 24px">
        <a class="logo" href="/">DOMOVKIN<span class="logo__ru" style="color: #126eff">.RU</span></a>
    </div>

    <div class="container">
        <div class="error-code"> 
            <span class="error-code__span">4</span>
            <span class="error-code__span">0</span>
            <span class="error-code__span">4</span>
        </div>
        
        <div class="message">Страница не найдена</div>
        <a href="{{ route('index') }}" class="home-link">Вернуться на главную</a>
    </div>
</body>
</html>