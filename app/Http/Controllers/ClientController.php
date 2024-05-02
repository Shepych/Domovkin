<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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
        # Записать в базу заявку и отправить сообщение в чат бота
        DB::table('applications')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'comment' => $request->comment,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function auth(Request $request) { # Авторизация
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()->route('client.profile');
        }

        return back()->withErrors([
            'login' => 'Неверные данные',
        ]);
    }

    public function profile() { # Кабинет пользователя
        $user = Auth::user();
        return view('client.profile', compact('user'));
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('client.profile');
    }
}
