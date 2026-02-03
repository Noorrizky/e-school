<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// --- TAMBAHKAN KODE INI ---
// Rute fallback untuk menangani error "Route [login] not defined"
Route::get('/login', function () {
    return redirect()->route('filament.admin.auth.login');
})->name('login');
// --------------------------