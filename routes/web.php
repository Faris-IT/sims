<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/tu', function () {
    return view('tu.dashboard');
})->middleware(['auth', 'role:tu'])->name('tu.dashboard');

Route::get('/guru', function () {
    return 'Halaman Guru';
})->middleware(['auth', 'role:guru'])->name('guru.dashboard');