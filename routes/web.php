<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('todolists', TodoController::class);

// テスト用
Route::get('/login', function() {
    return view('login');
});

Route::get('/add', function() {
    return view('add');
});

Route::get('/detail', function() {
    return view('detail');
});

Route::get('/edit', function() {
    return view('edit');
});
