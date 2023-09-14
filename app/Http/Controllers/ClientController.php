<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function auth() { # Страница авторизации
        return view('client.auth');
    }

    public function application(Request $request) { # Обработчик формы заявки
        return 'Заявка отправлена';
    }
}
