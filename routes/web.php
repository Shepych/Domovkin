<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TelegramController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/projects/{id}', [MainController::class, 'project'])->name('project.detail');
Route::get('/projects', [MainController::class, 'projects'])->name('projects');
Route::get('/articles', [ArticleController::class, 'list'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'detail'])->name('articles.detail');
Route::get('/services', [MainController::class, 'services'])->name('services');
Route::get('/reviews', [MainController::class, 'reviews'])->name('reviews');
Route::get('/portfolio', [MainController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'detail'])->name('portfolio.detail');

Route::get('/login', [ClientController::class, 'login'])->name('login');
Route::post('/auth', [ClientController::class, 'auth'])->name('client.authorize');

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');
    Route::get('/logout', [ClientController::class, 'logout'])->name('client.logout');
});

Route::post('/application', [ClientController::class, 'application'])->name('client.application');


Route::middleware(['role:admin', 'auth'])->name('admin.')->group(function() {
    Route::prefix('admin')->group(function() {
        # СТАТЬИ
        Route::get('/articles', [AdminController::class, 'articles'])->name('articles.page');
        Route::get('/articles/create', [AdminController::class, 'createArticle'])->name('articles.page.create');
        Route::post('/articles/create', [AdminController::class, 'createArticle'])->name('articles.method.create');

        Route::get('/articles/update/{id}', [AdminController::class, 'updateArticle'])->name('articles.page.update');
        Route::post('/articles/update/{id}', [AdminController::class, 'updateArticle'])->name('articles.method.update');

        Route::get('/articles/delete/{id}', [AdminController::class, 'deleteArticle'])->name('articles.method.delete');

        # ПРОЕКТЫ
        Route::get('/projects', [AdminController::class, 'projects'])->name('projects.page');
        Route::get('/projects/create', [AdminController::class, 'createProject'])->name('projects.page.create');
        Route::post('/projects/create', [AdminController::class, 'createProject'])->name('projects.method.create');

        Route::get('/projects/update/{id}', [AdminController::class, 'updateProject'])->name('projects.page.update');
        Route::post('/projects/update/{id}', [AdminController::class, 'updateProject'])->name('projects.method.update');

        Route::get('/projects/delete/{id}', [AdminController::class, 'deleteProject'])->name('projects.method.delete');

        Route::post('/upload', [AdminController::class, 'upload']);
        Route::post('/upload/{id}', [AdminController::class, 'uploadEdit']);

        # УСЛУГИ
        Route::get('/services', [AdminController::class, 'services'])->name('services.list');
        Route::post('/services/create', [AdminController::class, 'serviceCreate'])->name('services.create');

        # УСЛУГИ
        Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('portfolio.list');
        Route::get('/portfolio/create', [AdminController::class, 'portfolioCreate'])->name('portfolio.page.create');
        Route::post('/portfolio/create', [AdminController::class, 'portfolioCreate'])->name('portfolio.method.create');
    });
});

Route::get('/bot', [TelegramController::class, 'bot'])->name('bot');