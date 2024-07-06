<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    # СПИСОК СТАТЕЙ
    public function list() {
        $title = "Статьи по строительству и ремонту";
        $articles = Article::orderBy('created_at', 'DESC')->get();
        return view('articles.list', compact('articles', 'title'));
    }

    # СТРАНИЦА СТАТЬИ
    public function detail($slug) {
        
        $article = Article::where('slug', $slug)->first();
        $title = $article->title;
        $minutes = 15;
        $cookieName = 'article_' . $article->id . '_viewed';

        if(!isset($_COOKIE[$cookieName])) {
            $article->views = $article->views + 1;
            $article->update();
        }

        return response()->view('articles.detail', compact('article', 'title'))->withCookie(cookie($cookieName, true, $minutes));
    }
}
