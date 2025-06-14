<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rute Publik (Tidak perlu login)
Route::get('/', function () {
    return view('welcome');
});

// ===================================================================
// SEMUA RUTE DI BAWAH INI MEMBUTUHKAN LOGIN
// ===================================================================
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard (untuk semua user yang login)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil User (untuk semua user yang login)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Grup Rute Admin
    Route::middleware('role:Admin')->group(function () {
        Route::get('/admin-panel', fn() => '<h1>Panel Admin</h1>')->name('admin.panel');
        Route::resource('categories', App\Http\Controllers\CategoryController::class);
    });

    // Grup Rute Editor
    Route::middleware('role:Editor')->group(function () {
        Route::get('/editor-panel', fn() => '<h1>Panel Editor</h1>')->name('editor.panel');
        // Nanti rute approval berita ditaruh di sini
    });

    // Grup Rute Wartawan
    Route::middleware('role:Wartawan')->group(function () {
        Route::get('/wartawan-panel', fn() => '<h1>Panel Wartawan</h1>')->name('wartawan.panel');
        // Nanti rute CRUD berita oleh wartawan ditaruh di sini
    });

});
// ===================================================================

require __DIR__.'/auth.php';