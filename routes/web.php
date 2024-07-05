<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\PusherController;
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

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::post('/post/{post}/react', [ReactionController::class, 'reactToPost'])->name('post.react');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::post('/amizade/adicionar', [UsuarioController::class, 'adicionar'])->name('amizade.adicionar');
Route::post('/amizade/aceitar', [UsuarioController::class, 'aceitar'])->name('amizade.aceitar');

Route::get('profile/{id}', [UsuarioController::class, 'show'])->name('perfil.amigo');

Route::get('/mensagem', [PusherController::class, 'index'])->name('mensagem');

Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
Route::post('/receive', 'App\Http\Controllers\PusherController@receive');

Route::post('/messages', [MessageController::class, 'store'])->middleware('auth');