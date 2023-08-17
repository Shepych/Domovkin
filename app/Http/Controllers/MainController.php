<?php

namespace App\Http\Controllers;

use App\Models\Question;
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
}
