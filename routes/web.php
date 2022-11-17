<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('todolists', TodoController::class);



// テスト用
// Route::get('/login', function() {
//     return view('login');
// });

// Route::get('/create', function() {
//     return view('create');
// });

// Route::get('/show', function() {
//     return view('show');
// });

// Route::get('/edit', function() {
//     return view('edit');
// });
