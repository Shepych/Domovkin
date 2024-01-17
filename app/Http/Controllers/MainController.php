<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Question;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class MainController extends Controller
{
    public $rtsp = 'rtsp://admin:Huskar00@192.168.1.9:554';

    public function index() {
        $questions = Question::all();
        $projects = Project::all();
        return view('index', compact('questions', 'projects'));
    }

    public function projects() {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    public function project($id) {
        $project = Project::find($id);
        if(!$project) abort(404);
        return view('project', compact('project'));
    }
    

    public function services() {
        return view('services');
    }

    public function reviews() {
        return view('reviews');
    }
}
