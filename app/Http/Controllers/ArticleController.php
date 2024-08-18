<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{

    public $articlesPerPage = 3;
    # СПИСОК СТАТЕЙ
    public function list() {
        $title = "Статьи по строительству и ремонту";
        $seoDescription = "Изучайте полезные статьи по строительству и ремонту. Узнавайте о лучших методах ремонта, советах по выбору материалов и технике безопасности. Полезные руководства для успешного ремонта вашего дома!";
        $articles = Article::orderBy('created_at', 'DESC')->paginate($this->articlesPerPage);
        return view('articles.list', compact('articles', 'title', 'seoDescription'));
    }

    # СТРАНИЦА СТАТЬИ
    public function detail($slug) {
        $article = Article::where('slug', $slug)->first();
        $title = $article->title;
        $minutes = 15;
        $cookieName = 'article_' . $article->id . '_viewed';
        $seoDescription = $article->seo;

        if(!isset($_COOKIE[$cookieName])) {
            $article->views = $article->views + 1;
            $article->update();
        }

        return response()->view('articles.detail', compact('article', 'title', 'seoDescription'))->withCookie(cookie($cookieName, true, $minutes));
    }
}
