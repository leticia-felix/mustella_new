<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/postagem', function () {
    return view('postagem');
})->middleware(['auth'])->name('postagem');

Route::get('/pesquisa', function () {
    return view('pesquisa');
})->middleware(['auth'])->name('pesquisa');

Route::get('/confirmarPost', function () {
    return view('confirmarPost');
})->middleware(['auth'])->name('confirmarPost');

Route::get('/enviarPost', function () {
    return view('dashboard');
})->middleware(['auth'])->name('enviarPost');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware(['auth'])->name('perfil');

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');


    Route::get('/user/{id}', [RegisteredUserController::class, 'showPosts'])->name('user.profile');



    Route::get('/mustella', [PostController::class, 'index'])->name('mustella');

    Route::get('/perfil', [PostController::class, 'perfil'])->name('perfil');
    Route::put('/perfilupdate', [RegisteredUserController::class, 'update'])->name('perfil.update');
   
    Route::get('/search', [PostController::class, 'search'])->name('posts.search');

    Route::post('/posts/{id}/favorite', [FavoriteController::class, 'toggleFavorite'])->name('posts.favorite');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

});

require __DIR__.'/auth.php';
