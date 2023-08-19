<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index']);

Route::get('/project/{id}', [MainController::class, 'project'])->name('project.detail');

Route::get('/test', [MainController::class, 'test']);
