<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Support\Facades\DB;

class TelegramController extends Controller
{
    private $token;

    public function __construct() {
        $this->token = env('BOOK_BOT_TOKEN');
    }

    public function bot() {
        # Хук
        // $webhookUrl = 'https://domovkin.ru/bot';
        // $apiUrl = "https://api.telegram.org/bot{$this->token}/";
        // $setWebhookUrl = $apiUrl . 'setWebhook?url=' . urlencode($webhookUrl);
        // $response = file_get_contents($setWebhookUrl);
        // $response = json_decode($response, true);

        // if ($response['ok']) {
        //     echo 'Вебхук успешно установлен!';
        // } else {
        //     echo 'Ошибка при установке вебхука: ' . $response['description'];
        // }
        $update = file_get_contents("php://input");
        $update = json_decode($update, true);
        
        // Получение текста сообщения
        $message = isset($update['message']['text']) ? $update['message']['text'] : '';
        
        if ($message == '/start') {
            $chatId = $update['message']['chat']['id'];
            $keyboard = [
                // 'keyboard' => [
                //     [['text' => 'Кнопка 1'], ['text' => 'Кнопка 2']],
                //     [['text' => 'Кнопка 3'], ['text' => 'Кнопка 4']],
                // ],
                'inline_keyboard' => [
                    [
                        ['text' => '🔵 Проекты', 'callback_data' => 'projects'],
                        ['text' => '🔵 Услуги', 'callback_data' => 'services'],
                    ],
                    [
                        ['text' => '🔵 О компании', 'callback_data' => 'about'],
                        ['text' => '🔵 Сайт', 'url' => 'https://domovkin.ru'],
                    ],
                    [
                        ['text' => '🔵 Оформить заявку', 'callback_data' => 'application']
                    ]
                ]
            ];
        
            $imageUrl = 'https://domovkin.ru/img/domovkin.png';
            $encodedKeyboard = json_encode($keyboard);
        
            $sendMessage = [
                'chat_id' => $chatId,
                'caption' => 'Наша компания занимается строительством домов и ремонтом квартир, а так же реставрацией архитектуры по Москве и Московской области',
                'reply_markup' => $encodedKeyboard,
                'photo' => $imageUrl,
                'parse_mode' => 'HTML'
            ];
        
        
            // Отправляем запрос
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot{$this->token}/sendPhoto");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $sendMessage);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            
            
            // $sendMessageQuery = http_build_query($sendMessage);
            // $response = file_get_contents("https://api.telegram.org/bot{$this->token}/sendMessage?$sendMessageQuery");
            
            
            $result = json_decode($response, true);
            DB::table('telegram_users')->updateOrInsert([
                'user_id' =>  $result['result']['chat']['id']
            ],
            [
                'user_id' =>  $result['result']['chat']['id'],
                'message_id' => $result['result']['message_id'],
                'text' => $response,
                'last_callback' => 'start',
            ]);

            DB::table('telegram_applications')->insert([
                'user_id' =>  123123123,
            ]);
        }

        if (isset($update['callback_query'])) {
            $chatId = $update['callback_query']['message']['chat']['id'];
            $callbackData = $update['callback_query']['data'];
        
            // Обработка действий в зависимости от callback_data
            switch ($callbackData) {
                case 'projects':
                    $imageUrl = 'https://domovkin.ru/storage/projects/2/otPs3JOB9dm2NX4UUlITrQg37dEydQTAI9KPydvW.png';
                    // Обновить сообщение
                    // $this->editMessage($chatId);
                    $this->sendMessage($chatId, 'Проекты');
                    break;
                case 'services':
                    // Отправить смс
                    $this->sendMessage($chatId, 'Услуги');
                    break;
                case 'about':
                    // Отправить смс
                    $this->sendMessage($chatId, 'О нас');
                    break;
                case 'application':
                    $callbackData = 'step_1';
                    // Отправить смс
                    // $this->deleteMessages($chatId);
                    $this->sendMessage($chatId, 'Введите имя');
                    break;
            }

            DB::table('telegram_users')->where('user_id', $chatId)->update([
                'last_callback' => $callbackData,
            ]);
        }

        if(!isset($update['callback_query']) && $message != '/start') {
            $chatId = $update['message']['chat']['id'];
            // Обрабатывать заявку
            $userInfo = DB::table('telegram_users')->where('user_id', $chatId)->first();
            $newCallback = '';
            switch ($userInfo->last_callback) {
                case 'step_1':
                    $newCallback = 'step_2';
                    $this->sendMessage($chatId, 'Введите телефон');
                    break;

                case 'step_2': # Введите имя
                    $newCallback = 'step_3';
                    $this->sendMessage($chatId, 'Введите сообщение');
                    break;

                case 'step_3': # Введите ваше сообщение
                    $this->sendMessage($chatId, '✅ Заявка отправлена ✅');
                    $newCallback = 'start';
                    break;
                default:
                    $newCallback = $userInfo->last_callback;
                    break;
            }

            DB::table('telegram_users')->where('user_id', $chatId)->update([
                'last_callback' => $newCallback,
            ]);
        }

        return true;
    }
    
    public function sendMessage($chatId, $text) {
        $apiUrl = "https://api.telegram.org/bot{$this->token}/";
    
        $message = [
            'chat_id' => $chatId,
            'text' => $text,
        ];
    
        $sendMessageUrl = $apiUrl . 'sendMessage?' . http_build_query($message);
        file_get_contents($sendMessageUrl);
    }
    
    public function deleteMessages($chatId) {
        $apiUrl = "https://api.telegram.org/bot{$this->token}/";
        
        $messages = json_decode(file_get_contents($apiUrl . "getChatHistory?chat_id={$chatId}"));

        if ($messages->ok) {
            foreach ($messages->result as $message) {
                // Получаем ID каждого сообщения и удаляем его
                $messageId = $message->message_id;
                file_get_contents($apiUrl . "deleteMessage?chat_id={$chatId}&message_id={$messageId}");
                // Можно добавить задержку между удалениями, чтобы не нагружать сервер
                // sleep(1);
            }
        }
    }
    
    public function editMessage($chatId) {
        $row = DB::table('webhook')->where('user_id', $chatId)->first();
        $apiUrl = "https://api.telegram.org/bot{$this->token}/";
    
        $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'Black Button 3', 'callback_data' => 'black_button_1'],
                    ],
                    [
                        ['text' => 'Black Button 4', 'callback_data' => 'black_button_2'],
                    ],
                ],
            ];
        
            $encodedKeyboard = json_encode($keyboard);
        
            $sendMessage = [
                'message_id' => $row->message_id,
                'chat_id' => $chatId,
                'text' => '321',
                'reply_markup' => $encodedKeyboard,
            ];
        
            $sendMessageQuery = http_build_query($sendMessage);
            $response = file_get_contents("https://api.telegram.org/bot{$this->token}/editMessageText?$sendMessageQuery");
    }
}
