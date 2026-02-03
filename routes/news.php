<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('news.index');
})->name('home');

/*
|--------------------------------------------------------------------------
| NEWS
|--------------------------------------------------------------------------
*/
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Comment (login)
Route::post('/news/{news}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('news.comments.store');

// User tạo sản phẩm
Route::middleware('auth')->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
});

// Admin sửa / xóa
Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');

Route::post('/cart/checkout', [CartController::class, 'checkout'])
    ->middleware('auth')
    ->name('cart.checkout');

/*
|--------------------------------------------------------------------------
| ORDER (USER)
|--------------------------------------------------------------------------
*/
Route::post('/order', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('order.store');

Route::get('/order-success/{id}', [OrderController::class, 'success'])
    ->middleware('auth')
    ->name('order.success');

Route::get('/my-orders', [OrderController::class, 'myOrders'])
    ->middleware('auth')
    ->name('orders.my');

/*
|--------------------------------------------------------------------------
| ORDER (ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::get('/admin/orders', [OrderController::class, 'adminIndex'])
        ->name('admin.orders.index');

    Route::post('/admin/orders/{id}/status',
        [OrderController::class, 'updateStatus'])
        ->name('admin.orders.updateStatus');
});
Route::get('/search', [NewsController::class, 'search'])
    ->name('news.search');

 Route::get('/', function () {
    return view('home');
})->name('home');