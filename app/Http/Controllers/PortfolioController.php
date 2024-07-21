<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function detail(Request $request) {
        $portfolio = Portfolio::find($request->id);

        $referer = $request->headers->get('referer');
        $isFromPortfolioList = false;

        if ($referer) {
            $previousUrl = parse_url($referer, PHP_URL_PATH);
            $previousRoute = app('router')->getRoutes()->match(Request::create($previousUrl))->getName() . '.list';
            $isFromPortfolioList = $previousRoute === 'portfolio.list';
        }

        $title = 'Портфолио проект #'. $portfolio->id . ' - ' . $portfolio->type();
        $seoDescription = $portfolio->description;

        return view('portfolio.detail', compact('portfolio', 'isFromPortfolioList', 'title', 'seoDescription'));
    }
}