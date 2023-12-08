<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ClientController;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/project/{id}', [MainController::class, 'project'])->name('project.detail');
Route::get('/articles', [ArticleController::class, 'list'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'detail'])->name('articles.detail');

Route::get('/login', [ClientController::class, 'login'])->name('client.login_page');
Route::post('/auth', [ClientController::class, 'auth'])->name('client.authorize');
Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');

Route::post('/application', [ClientController::class, 'application'])->name('client.application');


Route::middleware(['role:admin'])->name('admin.')->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('/articles', [AdminController::class, 'articles'])->name('articles.page');
        Route::get('/articles/create', [AdminController::class, 'createArticle'])->name('articles.page.create');
        Route::post('/articles/create', [AdminController::class, 'createArticle'])->name('articles.method.create');
    });
});
