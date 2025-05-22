<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// GET login form — kasih nama 'login' untuk route('login')
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// POST login form — tidak perlu pakai name('login') agar tidak konflik
Route::post('/login', function (Request $request) {
    // Simulasi login sukses: redirect ke halaman user
    return redirect('/user');
});

// Register form
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Dummy pages
Route::view('/admin', 'admin.dashboard');
Route::view('/user', 'user.beranda');
Route::view('/pakar', 'pakar.dashboard');
