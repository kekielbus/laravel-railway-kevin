<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::get('/tienda', function () {
    return view('tienda');
})->name('tienda');


Route::get('/licencia', function () {
    return view('licencia');
})->name('licencia');
