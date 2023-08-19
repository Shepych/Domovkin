<?php

namespace App\Http\Controllers;

use App\Models\Question;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $questions = Question::all();
        return view('index', compact('questions'));
    }

    public function project($id) {
        return view('project');
    }

    public function test() {
        $ffmpeg = FFMpeg::create(); // создание объекта FFMpeg

//        dd($ffmpeg);
        $video = $ffmpeg->open('rtsp://admin:Huskar800@95.165.27.142:554'); // открытие потока с IP-камеры RTSP

        header('Content-Type: video/mp4'); // установка заголовка для вывода видео в браузере

        $format = new X264(); // установка формата видео для конвертации

        $format->setAudioCodec('libmp3lame') // установка кодека аудио
        ->setVideoCodec('libx264') // установка кодека видео
        ->setVideoFrameRate(25); // установка частоты кадров

        $video->filters()->resize(new Dimension(640, 480))->synchronize(); // изменение размера видео до 640x480

        return $video->save($format, 'php://output'); // конвертация и вывод видео в браузер
//        return view('test');
    }
}
