<?php

use App\Http\Controllers\EloquentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [TestController::class, 'show']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store'])->name('product.create');
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
Route::get('/products-test', [ProductController::class, 'indexTest'])->name('products.index-test');


Route::get('/collection', [TestController::class, 'collectionSatesto']);


Route::get('/relations', [EloquentController::class, 'index']);

Route::get('/orders', [OrderController::class, 'index']);

Route::get('/session', [SessionController::class, 'index']);
Route::get('/session-test', [SessionController::class, 'testIndex']);

Route::get('/set-language/{lang}', [LanguageController::class, 'update']);


Route::get('/report', [ReportController::class, 'index']);
Route::get('/query-test', [TestController::class, 'queryTest']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
