<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

//トップページ
Route::get('/', [TodoController::class, 'index']);

//新規登録
Route::get('/create', [TodoController::class, 'create']);
Route::post('/store', 'App\Http\Controllers\TodoController@store');

//編集ページ
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/update', 'App\Http\Controllers\TodoController@update');

//詳細
Route::get('/show/{id}', [TodoController::class, 'show']);

//削除
Route::post('/delete/{id}', 'App\Http\Controllers\TodoController@softDeletes');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('todolists', TodoController::class);
