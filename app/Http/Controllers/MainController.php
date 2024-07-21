<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Question;
use App\Models\ServiceCategory;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class MainController extends Controller
{
    public $rtsp = 'rtsp://admin:Huskar00@192.168.1.9:554';

    public function index() {
        $seoDescription = "Услуги строительства и ремонта домов и квартир от профессионалов. Опытные специалисты предлагают качественные работы: от ремонта интерьеров до полного строительства. Запишитесь на бесплатную консультацию!";
        $title = "Строительство домов и ремонт квартир в Москве";
        $questions = Question::all();
        $projects = Project::orderByRaw('ISNULL(position), position ASC')
            ->take(12)
            ->get();
        return view('index', compact('questions', 'projects', 'title', 'seoDescription'));
    }

    public function projects() {
        $title = "Проекты загородных домов и коттеджей";
        $projects = Project::orderByRaw('ISNULL(position), position ASC')
            ->get();
        return view('projects', compact('projects', 'title'));
    }

    public function project($id) {
        $project = Project::find($id);
        $title = "Проект №" . $project->id;
        if(!$project) abort(404);
        return view('project', compact('project', 'title'));
    }

    public function services() {
        $title = "Построить дом, сделать ремонт квартиры - цена (стоимость) услуги";
        $categories = ServiceCategory::all();
        return view('services', compact('categories', 'title'));
    }

    public function portfolio() {
        $title = "Примеры работ";
        $seoDescription = "В этом разделе мы коллекционируем все наши выполненные работы, чтобы клиенты могли наглядно увидеть результаты и ознакомиться со всеми объектами которые были реализованы нами.";
        $portfolio = Portfolio::all();
        return view('portfolio.portfolio', compact('portfolio', 'title', 'seoDescription'));
    }

    // public function reviews() {
    //     return view('reviews');
    // }
}
