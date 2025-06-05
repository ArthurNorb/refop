<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
