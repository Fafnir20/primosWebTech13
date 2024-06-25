<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\UsuarioController@create');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/index', function () {
    return view('index');
})->name('index');


Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');

Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

//Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login.form');

Route::post('/login', [UsuarioController::class, 'login'])->name('login');

Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::get('/index', [UsuarioController::class, 'buscarUsuarios'])->name('buscarUsuarios');

Route::get('/index', [UsuarioController::class, 'index'])->name('indexUser');


Route::get('/profile', [UsuarioController::class, 'OpenProfile'])->name('OpenProfile');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
