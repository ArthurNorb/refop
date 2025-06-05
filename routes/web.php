<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Middleware\EnsureUserIsAdmin;

Route::get('/', function () {
    return view('index');
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/republicas', function () {
    return view('republicas');
});

Route::get('/eventos', function () {
    return view('eventos');
});

Route::get('/galeria', function () {
    return view('galeria');
});

Route::get('/contato', function () {
    return view('contato');
});

Route::middleware(['auth', EnsureUserIsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/gerenciar-usuarios', [AdminUserController::class, 'index'])->name('users.index'); 
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('users.show');

        // Se tiver rotas para editar e atualizar um usuário
        // Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        // Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update'); // Ou PATCH
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
