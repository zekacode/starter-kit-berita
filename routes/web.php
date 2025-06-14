<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute yang hanya bisa diakses oleh Admin
Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/admin-panel', function () {
        return '<h1>Selamat Datang di Panel Admin</h1>';
    })->name('admin.panel');
});

// Contoh untuk Editor
Route::group(['middleware' => ['auth', 'role:Editor']], function () {
    Route::get('/editor-panel', function () {
        return '<h1>Selamat Datang di Panel Editor</h1>';
    })->name('editor.panel');
});

// Contoh untuk Wartawan
Route::group(['middleware' => ['auth', 'role:Wartawan']], function () {
    Route::get('/wartawan-panel', function () {
        return '<h1>Selamat Datang di Panel Wartawan</h1>';
    })->name('wartawan.panel');
});

require __DIR__.'/auth.php';
