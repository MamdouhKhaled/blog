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

Route::name('admin.')->prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', function () {
        return view('Dashboard');
    })->name('dashboard');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('comments', \App\Http\Controllers\CommentController::class)->only('store');

});

Route::resource('/', \App\Http\Controllers\CategoryController::class);
Route::get('search', [\App\Http\Controllers\CategoryController::class, 'search'])->name('search');
Route::resource('posts', \App\Http\Controllers\PostController::class)->only('show');
Route::resource('comments', \App\Http\Controllers\CommentController::class)->only('store');


require __DIR__.'/auth.php';
