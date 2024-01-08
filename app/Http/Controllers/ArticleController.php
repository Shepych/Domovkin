<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $minutes = 15;
        $cookieName = 'article_' . $article->id . '_viewed';

        if(!isset($_COOKIE[$cookieName])) {
            $article->views = $article->views + 1;
            $article->update();
        }

        return response()->view('articles.detail', compact('article'))->withCookie(cookie($cookieName, true, $minutes));
    }
}
