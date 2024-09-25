<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

//トップページの表示
Route::get('/', [PostController::class,'index'])
    ->name('index.posts');

//個別ページの表示
Route::get('/posts/{id}', [PostController::class,'text'])
    ->name('text.posts')
    ->where('id','[0-9]+');

//新規追加ページの表示
Route::get('/posts/create', [PostController::class,'create'])
    ->name('create.posts');

//新規追加時使用
Route::post('/posts/store', [PostController::class,'store'])
    ->name('store.posts');

//編集ページの表示
Route::get('/posts/{id}/edit', [PostController::class,'edit'])
    ->name('edit.posts')
    ->where('id','[0-9]+');

//更新処理
Route::patch('/posts/{id}/update', [PostController::class,'update'])
    ->name('update.posts')
    ->where('id','[0-9]+');

//削除
Route::delete('/posts/{id}/destroy', [PostController::class,'destroy'])
    ->name('destroy.posts')
    ->where('id','[0-9]+');

// 検索ページ表示
Route::get('/search', [PostController::class, 'showSearchForm'])
    ->name('show.search');

// 検索
Route::post('/search', [PostController::class, 'search'])
    ->name('search.posts');

Route::post('/posts/{id}/comments', [CommentController::class,'store'])
    ->name('store.comments')
    ->where('id','[0-9]+');

//削除
Route::delete('/comments/{comment}/destroy', [CommentController::class,'destroy'])
    ->name('destroy.comments')
    ->where('comment','[0-9]+');
