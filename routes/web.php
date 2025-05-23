<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\SolusiController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Login & Register
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', fn (Request $request) => redirect('/user'));
Route::get('/register', fn () => view('auth.register'))->name('register');
Route::post('/register', fn () => redirect('/login'));

// Admin Dashboard & Pages
Route::view('/admin', 'admin.dashboard');

Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/gejala', 'admin.gejala')->name('admin.gejala.index');
    Route::view('/solusi', 'admin.solusi')->name('admin.solusi.index');
    Route::view('/pengguna', 'admin.pengguna')->name('admin.pengguna.index');
    Route::view('/pertanyaan', 'admin.pertanyaan')->name('admin.pertanyaan.index');
});

Route::prefix('admin/gejala')->name('admin.gejala.')->group(function () {
    Route::get('/', [GejalaController::class, 'index'])->name('index');
    Route::get('/create', [GejalaController::class, 'create'])->name('create');
    Route::post('/', [GejalaController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [GejalaController::class, 'edit'])->name('edit');
    Route::put('/{id}', [GejalaController::class, 'update'])->name('update');
    Route::delete('/{id}', [GejalaController::class, 'destroy'])->name('destroy');
});

// ✅ FIXED Diagnosa CRUD routes - Full grouped under `admin.diagnosa.*`
Route::prefix('admin/diagnosa')->name('admin.diagnosa.')->group(function () {
    Route::get('/', [DiagnosaController::class, 'index'])->name('index');
    Route::get('/create', [DiagnosaController::class, 'create'])->name('create');
    Route::post('/', [DiagnosaController::class, 'store'])->name('store'); // ✅ Store Route Fixed
    Route::get('/{id}/edit', [DiagnosaController::class, 'edit'])->name('edit');
    Route::put('/{id}', [DiagnosaController::class, 'update'])->name('update'); // ✅ Update Route Fixed
    Route::delete('/{id}', [DiagnosaController::class, 'destroy'])->name('destroy');
});

// Solusi Admin Route Group
Route::prefix('admin/solusi')->name('admin.solusi.')->group(function () {
    Route::get('/', [SolusiController::class, 'index'])->name('index');
    Route::get('/create', [SolusiController::class, 'create'])->name('create');
    Route::post('/', [SolusiController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [SolusiController::class, 'edit'])->name('edit');
    Route::put('/{id}', [SolusiController::class, 'update'])->name('update');
    Route::delete('/{id}', [SolusiController::class, 'destroy'])->name('destroy');
});
// User pages
Route::view('/user', 'user.beranda');
Route::view('/diagnosa', 'user.diagnosa');
Route::view('/pertanyaan', 'user.pertanyaan');
Route::post('/output-tingkatan', fn () => view('user.output-tingkatan'));
Route::view('/output-tingkatan', 'user.output-tingkatan')->name('output');
Route::view('/output-failed', 'user.output-failed');
Route::view('/profil', 'user.profil');

// Pakar page
Route::view('/pakar', 'pakar.dashboard');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

