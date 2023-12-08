<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class ClientController extends Controller
{

    public function login() { # Страница авторизации
        if(!Auth::user()) {
            return view('client.auth');
        } else {
            return redirect()->route('client.profile');
        }
    }

    public function application(Request $request) { # Обработчик формы заявки
        return 'Заявка отправлена';
    }

    public function auth(Request $request) { # Авторизация
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('client.profile');
        }

        return back()->withErrors([
            'login' => 'Неверный E-Mail',
        ]);
    }

    public function profile() { # Кабинет пользователя
        $user = Auth::user();

        return view('client.profile', compact('user'));
    }
}
