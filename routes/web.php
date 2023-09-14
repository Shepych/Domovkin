<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ClientController;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/project/{id}', [MainController::class, 'project'])->name('project.detail');
Route::get('/articles', [ArticleController::class, 'list'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'detail'])->name('articles.detail');

Route::get('/login', [ClientController::class, 'auth'])->name('client.auth');
Route::post('/application', [ClientController::class, 'application'])->name('client.application');
