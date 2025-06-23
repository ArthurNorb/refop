<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepublicasController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\EnsureUserIsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', EnsureUserIsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/gerenciar-usuarios', [AdminUserController::class, 'index'])->name('users.index');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    });

Route::get('/editar-perfil', [UserProfileController::class, 'edit'])->middleware('auth')->name('editar-perfil');
Route::get('/meu-perfil', [UserProfileController::class, 'show'])->middleware('auth')->name('meu-perfil');
Route::put('/perfil/atualizar', [UserProfileController::class, 'update'])->middleware('auth')->name('perfil.update');

Route::get('/contato', [ContactController::class, 'show'])->name('contato.show');
Route::post('/contato', [ContactController::class, 'send'])->name('contato.send');

Route::middleware(['auth', EnsureUserIsAdmin::class])
    ->prefix('republicas')
    ->name('republicas.')
    ->group(function () {
        Route::get('/adicionar', [RepublicasController::class, 'create'])->name('create');
        Route::post('/', [RepublicasController::class, 'store'])->name('store');
        Route::get('/{republica}/editar', [RepublicasController::class, 'edit'])->name('edit');
        Route::put('/{republica}', [RepublicasController::class, 'update'])->name('update');
        Route::delete('/{republica}', [RepublicasController::class, 'destroy'])->name('delete');
        Route::delete('/fotos/{foto}', [RepublicasController::class, 'destroyFoto'])->name('fotos.destroy');
    });

Route::get('/republicas', [RepublicasController::class, 'index'])->name('republicas.index');
Route::get('/republicas/{republica}', [RepublicasController::class, 'show'])->name('republicas.show');

Route::get('/sobre', [SobreController::class, 'show'])->name('sobre.show');
Route::put('/sobre', [SobreController::class, 'update'])->name('sobre.update')->middleware('auth');

Route::get('/galeria', [GalleryController::class, 'index'])->name('galeria.index');
Route::middleware('auth')->group(function () {
    Route::post('/galeria', [GalleryController::class, 'store'])->name('galeria.store');
    Route::delete('/galeria/{image}', [GalleryController::class, 'destroy'])->name('galeria.destroy');
});

Route::get('/eventos', [EventController::class, 'index'])->name('eventos.index');
Route::get('/eventos/criar', [EventController::class, 'create'])->name('eventos.create')->middleware('auth');
Route::get('/eventos/{event}', [EventController::class, 'show'])->name('eventos.show');
Route::middleware(['auth'])->group(function () {
    Route::post('/eventos', [EventController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/{event}/editar', [EventController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/{event}', [EventController::class, 'update'])->name('eventos.update');
    Route::delete('/eventos/{event}', [EventController::class, 'destroy'])->name('eventos.destroy');
});

Route::get('/artigos', [ArticleController::class, 'index'])->name('artigos.index');
Route::get('/artigos/create', [ArticleController::class, 'create'])->name('artigos.create')->middleware('auth');
Route::post('/artigos', [ArticleController::class, 'store'])->name('artigos.store')->middleware('auth');
Route::get('/artigos/{article}', [ArticleController::class, 'show'])->name('artigos.show');
Route::middleware('auth')->group(function () {
    Route::get('/artigos/{article}/edit', [ArticleController::class, 'edit'])->name('artigos.edit');
    Route::put('/artigos/{article}', [ArticleController::class, 'update'])->name('artigos.update');
    Route::delete('/artigos/{article}', [ArticleController::class, 'destroy'])->name('artigos.destroy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
