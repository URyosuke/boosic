<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\BooksController;

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

Route::get('/posts/selectbook', [BooksController::class,'form'])->name('posts.selectbook');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');

Route::resource('/posts', PostController::class);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/posts', PostController::class);
    Route::post('/posts/{post}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/posts/{post}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::get('/bookmarks', [PostController::class, 'bookmark_posts'])->name('bookmarks');
});
