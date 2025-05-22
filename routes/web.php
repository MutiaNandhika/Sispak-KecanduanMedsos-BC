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

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    return redirect('/login'); // simulasi saja
});

// Dummy pages
Route::view('/admin', 'admin.dashboard');

Route::view('/user', 'user.beranda');
Route::view('/diagnosa', 'user.diagnosa');
Route::post('/output-tingkatan', function () {
    return view('user.output-tingkatan'); // buat view sesuai kebutuhanmu
});
Route::view('/output-tingkatan', 'user.output-tingkatan')->name('output');


Route::view('/pakar', 'pakar.dashboard');
