<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return redirect()->route('news.index');
})->name('home');

// Comment (bắt buộc đăng nhập)
Route::post('news/{news}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('news.comments.store');

// Bảo vệ thêm / sửa / xóa (L14)
Route::middleware(['auth'])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});

// Public routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
