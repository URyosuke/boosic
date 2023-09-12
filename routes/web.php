<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\FollowController;

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
Route::get('/posts/selectmusic',[MusicController::class,'form'])->name('posts.selectmusic');
Route::get('posts/searchmusic',[MusicController::class,'search'])->name('posts.searchmusic');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');

Route::resource('/posts', PostController::class);

Route::get('/home/{id}', [HomeController::class, 'indexx'])->name('posthome');
Route::get('bookmarks/{id}', [PostController::class,'bookmark_others_posts'])->name('othersbookmarks');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/posts', PostController::class);
    Route::post('/posts/{post}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/posts/{post}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::get('/bookmarks', [PostController::class, 'bookmark_posts'])->name('bookmarks');
});

Route::group(['middleware' => ['auth']], function(){
    Route::post('/user/{user}/follow', [FollowController::class,'follow_do'])->name('follow');
    Route::get('/user/{user}/follow_check', [FollowController::class,'follow_check'])->name('follow_check');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/follow/{userId}', [ FollowController::class, 'store']);
    Route::post('/like/{postId}',[BookmarkController::class,'store']);
});
