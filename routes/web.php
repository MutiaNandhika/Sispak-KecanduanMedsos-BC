<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    return redirect('/login'); // simulasi saja
});

// Dummy pages
Route::view('/admin', 'admin.dashboard');
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/diagnosa', 'admin.diagnosa')->name('admin.diagnosa.index');
    Route::view('/gejala', 'admin.gejala')->name('admin.gejala.index');
    Route::view('/solusi', 'admin.solusi')->name('admin.solusi.index');
    Route::view('/pengguna', 'admin.pengguna')->name('admin.pengguna.index');
});

Route::view('/user', 'user.beranda');
Route::view('/diagnosa', 'user.diagnosa');
Route::view('/pertanyaan', 'user.pertanyaan');
Route::post('/output-tingkatan', function () {
    return view('user.output-tingkatan'); // buat view sesuai kebutuhanmu
});
Route::view('/output-tingkatan', 'user.output-tingkatan')->name('output');
Route::view('/output-failed', 'user.output-failed');
Route::view('/profil', 'user.profil');

Route::view('/pakar', 'pakar.dashboard');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); // Atau ke halaman login
})->name('logout');