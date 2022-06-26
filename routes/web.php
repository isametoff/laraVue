<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::name('main.')->prefix('main')->group(function () {
    Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('index');
});

Route::name('category.')->prefix('categories')->group(function () {
    Route::get('/', App\Http\Controllers\Category\IndexController::class)->name('index');
    Route::get('/create', App\Http\Controllers\Category\CreateController::class)->name('create');
    Route::post('/store', App\Http\Controllers\Category\StoreController::class)->name('store');
    Route::get('/{category}/edit', App\Http\Controllers\Category\EditController::class)->name('edit');
    Route::patch('/{category}', App\Http\Controllers\Category\UpdateController::class)->name('update');
    Route::delete('/{category}', App\Http\Controllers\Category\DeleteController::class)->name('delete');
});
Route::name('color.')->prefix('colors')->group(function () {
    Route::get('/', App\Http\Controllers\Color\IndexController::class)->name('index');
    Route::get('/create', App\Http\Controllers\Color\CreateController::class)->name('create');
    Route::post('/store', App\Http\Controllers\Color\StoreController::class)->name('store');
    Route::get('/{color}/edit', App\Http\Controllers\Color\EditController::class)->name('edit');
    Route::patch('/{color}', App\Http\Controllers\Color\UpdateController::class)->name('update');
    Route::delete('/{color}', App\Http\Controllers\Color\DeleteController::class)->name('delete');
});
Route::name('tag.')->prefix('tags')->group(function () {
    Route::get('/', App\Http\Controllers\Tag\IndexController::class)->name('index');
    Route::get('/create', App\Http\Controllers\Tag\CreateController::class)->name('create');
    Route::post('/store', App\Http\Controllers\Tag\StoreController::class)->name('store');
    Route::get('/{tag}/edit', App\Http\Controllers\Tag\EditController::class)->name('edit');
    Route::patch('/{tag}', App\Http\Controllers\Tag\UpdateController::class)->name('update');
    Route::delete('/{tag}', App\Http\Controllers\Tag\DeleteController::class)->name('delete');
});
Route::name('user.')->prefix('users')->group(function () {
    Route::get('/', App\Http\Controllers\User\IndexController::class)->name('index');
    Route::get('/create', App\Http\Controllers\User\CreateController::class)->name('create');
    Route::post('/store', App\Http\Controllers\User\StoreController::class)->name('store');
    Route::get('/{user}', App\Http\Controllers\User\ShowController::class)->name('show');
    Route::get('/{user}/edit', App\Http\Controllers\User\EditController::class)->name('edit');
    Route::patch('/{user}', App\Http\Controllers\User\UpdateController::class)->name('update');
    Route::delete('/{user}', App\Http\Controllers\User\DeleteController::class)->name('delete');
});
Route::name('product.')->prefix('products')->group(function () {
    Route::get('/', App\Http\Controllers\Product\IndexController::class)->name('index');
    Route::get('/create', App\Http\Controllers\Product\CreateController::class)->name('create');
    Route::post('/store', App\Http\Controllers\Product\StoreController::class)->name('store');
    Route::get('/{product}', App\Http\Controllers\Product\ShowController::class)->name('show');
    Route::get('/{product}/edit', App\Http\Controllers\Product\EditController::class)->name('edit');
    Route::patch('/{product}', App\Http\Controllers\Product\UpdateController::class)->name('update');
    Route::delete('/{product}', App\Http\Controllers\Product\DeleteController::class)->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
