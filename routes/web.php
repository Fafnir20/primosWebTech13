<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\UsuarioController@index');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/index', function () {
    return view('index');
})->name('index');
