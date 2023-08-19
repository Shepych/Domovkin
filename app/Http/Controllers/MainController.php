<?php

namespace App\Http\Controllers;

use App\Models\Question;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class MainController extends Controller
{
    public $rtsp = 'rtsp://admin:Huskar800@192.168.1.9:554';

    public function index() {
        $questions = Question::all();
        return view('index', compact('questions'));
    }

    public function project($id) {
        return view('project');
    }

    public function test() {
        $ffmpeg = FFMpeg::fromDisk('rtsp')
            ->open($this->rtsp)
            ->export()
            ->toDisk('public')
            ->inFormat(new X264)
            ->toMedia('output.mp4');

        return response()->file(public_path('output.mp4'));
    }
}
