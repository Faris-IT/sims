<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/tu', function () {
    return view('tu.dashboard');
})->middleware(['auth', 'role:tu'])->name('tu.dashboard');

Route::get('/guru', function () {
    return view('guru.dashboard');
})->middleware(['auth', 'role:guru'])->name('guru.dashboard');

Route::get('/kepala-sekolah', function () {
    return view('kepala.dashboard');
})->middleware(['auth', 'role:kepala_sekolah'])->name('kepala.dashboard');

Route::get('/perpustakaan', function () {
    return view('perpustakaan.dashboard');
})->middleware(['auth', 'role:perpustakaan'])->name('perpustakaan.dashboard');

Route::get('/siswa', function () {
    return view('siswa.dashboard');
})->middleware(['auth', 'role:siswa'])->name('siswa.dashboard');

Route::middleware(['auth', 'role:tu,kepala_sekolah'])->group(function () {
    Route::resource('students', StudentController::class);
});