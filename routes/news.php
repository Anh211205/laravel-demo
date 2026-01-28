<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return redirect()->route('news.index');
})->name('home');

Route::resource('news', NewsController::class);

