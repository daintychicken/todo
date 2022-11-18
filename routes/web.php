<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function() {
    Route::group(['middleware' => 'auth'], function(){

//トップページ
Route::get('/', [TodoController::class, 'index'])->name('todo.index');

//新規登録
Route::get('/user/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/user/store', 'App\Http\Controllers\TodoController@store');

//編集ページ
Route::get('/user/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/user/update', 'App\Http\Controllers\TodoController@update');

//詳細
Route::get('/user/show/{id}', [TodoController::class, 'show'])->name('todo.show');

//削除
Route::post('/user/delete/{id}', 'App\Http\Controllers\TodoController@softDeletes')->name('todo.delete');

//ログアウト
Route::get('/user/logout', 'App\Http\Controllers\LoginController@getLogout')->name('todo.logout');
    });
});


//ログイン
Route::get('/login', 'App\Http\Controllers\LoginController@getSignin')->name('todo.signin');
Route::post('/login', 'App\Http\Controllers\LoginController@postSignin');


