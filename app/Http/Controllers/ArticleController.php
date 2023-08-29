<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    # СПИСОК СТАТЕЙ
    public function list() {
        $articles = Article::all();
        return view('articles.list', compact('articles'));
    }

    # СТРАНИЦА СТАТЬИ
    public function detail($slug) {
        $article = Article::where('slug', $slug)->first();
        return view('articles.detail', compact('article'));
    }
}
