<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;

class TelegramController extends Controller
{
    private $token;

    public function __construct() {
        $this->token = env('BOOK_BOT_TOKEN');
    }

    public function bot() {
        $client = new GuzzleHttp\Client();
        $result = json_decode($client->get("https://api.telegram.org/bot{$this->token}/getMe")->getBody()->getContents());
        # Когда message /start - отдаём меню
        dd($result);
        return 123123;
    }
}
