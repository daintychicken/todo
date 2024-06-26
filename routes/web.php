<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function(){

    //トップページ
    Route::get('/', [TodoController::class, 'index'])->name('todo.index');

    //ユーザープロフィール
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    //ユーザー検索
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');

    //新規登録
    Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
    Route::post('/store', [TodoController::class, 'store'])->name('todo.store');

    //編集ページ
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::put('/update', [TodoController::class, 'update'])->name('todo.update');

    //詳細
    Route::get('/show/{id}', [TodoController::class, 'show'])->name('todo.show');

    //削除
    Route::post('/delete/{id}', [TodoController::class, 'softDeletes'])->name('todo.delete');

    //ログアウト
    Route::get('/logout', [LoginController::class, 'getLogout'])->name('todo.logout');

    //like
    Route::get('/reply/like/{id}', [LikeController::class,'like'])->name('reply.like');
    Route::get('/reply/unlike/{id}', [LikeController::class,'unlike'])->name('reply.unlike');

});


//ログイン
Route::get('/login', [LoginController::class, 'getLogin'])->name('todo.login');
Route::post('/login', [LoginController::class, 'postLogin']);
