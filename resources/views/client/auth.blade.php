<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            min-height: 100%;
            background: linear-gradient(180deg,#022d5a,#0e3d6f);
        }

        html {
            height: 100%;
            min-height: 100%;
        }

        @font-face {
            font-family: 'Roboto';
            src: url('/fonts/Roboto/roboto.ttf');
        }

        @font-face {
            font-family: 'Grotesk';
            src: url('/fonts/Grotesk/akzidenzgroteskpro_bold.ttf');
        }

        @font-face {
            font-family: 'Euclid';
            src: url('/fonts/Euclid/EuclidCircularA-Light.ttf');
        }

        .logo {
            font-family: Grotesk;
            margin-bottom: 20px;
            display: block;
            text-align: center;
            font-size: 32px;
            color: white;
            text-decoration: none;
            margin-top: 20px;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            /*background: linear-gradient(180deg,#022d5a,#0e3d6f);*/
            /*width: 240px;*/
            padding: 40px;
            padding-top: 10px;
            /*border-radius: 12px;*/
            /*box-shadow: 0 0 8px #126eff;*/
        }

        form input[type=text] {
            background-color: #011d42;
            height: 50px;
            width: 350px;
            border: none;
            font-size: 20px;
            color: white;
            border-radius: 10px;
            box-shadow: inset 0 0 6px black;
            padding-left: 20px;
            padding-right: 20px;

        }
        form input {
            text-align: center;
            /*color: #3c5d82;*/
        }
        form input[type=password] {
            border: none;
            margin-top: 20px;
            width: calc(100% - 40px);
            height: 50px;
            background-color: #011d42;
            font-size: 20px;
            color: white;
            box-shadow: inset 0 0 6px black;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 10px;
        }

        .submit__button {
            min-height: 50px;
            display: block;
            width: 100%;
            margin-top: 20px;
            background: #126eff;
            border-radius: 10px;
            max-width: 240px;
            outline: none;
            border: none;
            font-size: 20px;
            color: white;
            box-shadow: 0 0 3px black;
            transition: 0.2s;
        }

        a span {
            transition: 0.2s;
        }

        a:hover span {
            color: white !important;
        }

        .submit__button:hover {
            color: #126eff;
            background-color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="{{ route('client.authorize') }}" method="POST">
        @csrf
        <a class="logo" href="{{ route('index') }}">DOMOVKIN<span style="color: #126eff">.RU</span></a>
        <input type="text" name="email" placeholder="E-Mail">
        <input type="password" name="password" placeholder="••••••">
        <input class="submit__button" type="submit" value="Войти">
        @error('login')
            {{ $message }}
        @enderror
    </form>
</body>
</html>
