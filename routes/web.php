<?php

use Illuminate\Support\Facades\Route;

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