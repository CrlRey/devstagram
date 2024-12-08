<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;

Route::get('/', HomeController::class)->name('home')->middleware('auth');

Route::get('/register-la', [RegisterController::class, 'index'])->name('register');
Route::post('/register-la', [RegisterController::class, 'store']);

//Perfil
Route::get('user/edit-profile', [PerfilController::class, 'index'])->name('profile.index')->middleware('auth');

Route::post('user/edit-profile', [PerfilController::class, 'store'])->name('profile.store');

// Muro

Route::get('/profile/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');




// Login

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Logout

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
//Imagen

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagen');

//Muro2
Route::get('/user/{user:username}/post/{post}',[PostController::class, 'show'])->name('posts.show');
Route::post('/user/{user:username}/post/{post}',[ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/post/{post}',[PostController::class, 'destroy'])->name('posts.destroy');


// post
Route::post('/posts', [PostController::class, 'store'])->name('post.store');

//Likes
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

// Siguiendo Usuarios
Route::post('user/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('user/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');




