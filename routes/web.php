<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HasilDiagnosaController;
use App\Http\Controllers\HasilGejalaController;
use App\Models\Diagnosa;

use App\Models\Pertanyaan;

// Welcome Page
Route::get('/', function () {
    return view('welcome-page');
})->middleware('guest');
// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->middleware(\App\Http\Middleware\RoleMiddleware::class . ':admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    
    Route::prefix('gejala')->name('admin.gejala.')->group(function () {
        Route::get('/', [GejalaController::class, 'index'])->name('index');
        Route::get('/create', [GejalaController::class, 'create'])->name('create');
        Route::post('/', [GejalaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [GejalaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [GejalaController::class, 'update'])->name('update');
        Route::delete('/{id}', [GejalaController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('diagnosa')->name('admin.diagnosa.')->group(function () {
        Route::get('/', [DiagnosaController::class, 'index'])->name('index');
        Route::get('/create', [DiagnosaController::class, 'create'])->name('create');
        Route::post('/', [DiagnosaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DiagnosaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DiagnosaController::class, 'updateAdmin'])->name('update');
        Route::delete('/{id}', [DiagnosaController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('solusi')->name('admin.solusi.')->group(function () {
        Route::get('/', [SolusiController::class, 'index'])->name('index');
        Route::get('/create', [SolusiController::class, 'create'])->name('create');
        Route::post('/', [SolusiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SolusiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SolusiController::class, 'update'])->name('update');
        Route::delete('/{id}', [SolusiController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('pertanyaan')->name('admin.pertanyaan.')->group(function () {
        Route::get('/', [PertanyaanController::class, 'index'])->name('index');
        Route::get('/create', [PertanyaanController::class, 'create'])->name('create');
        Route::post('/', [PertanyaanController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PertanyaanController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PertanyaanController::class, 'update'])->name('update');
        Route::delete('/{id}', [PertanyaanController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('user')->name('admin.user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{id_user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id_user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id_user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('hasil-diagnosa')->name('admin.hasil.')->group(function () {
        Route::get('/', [HasilDiagnosaController::class, 'index'])->name('index');
        Route::delete('/{id}', [HasilDiagnosaController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('hasil-gejala')->name('admin.hasilgejala.')->group(function () {
        Route::get('/', [HasilGejalaController::class, 'index'])->name('index');
        Route::delete('/{id}', [HasilGejalaController::class, 'destroy'])->name('destroy');
    });

    Route::get('/profil', function() {
        return view('admin.profil');
    })->name('admin.profil.index');
    
});

// Pakar Routes
Route::prefix('pakar')->middleware(\App\Http\Middleware\RoleMiddleware::class . ':pakar')->group(function () {
    Route::view('/', 'pakar.dashboard')->name('pakar.dashboard');
    
    // Diagnosa routes
    Route::get('/diagnosa', [DiagnosaController::class, 'indexPakar'])->name('pakar.diagnosa.index');
    Route::put('/diagnosa/{id}/verify', [DiagnosaController::class, 'updatePakar'])->name('pakar.diagnosa.verify');
    
    // Gejala routes - add pakar prefix to route name
    Route::get('/gejala', [GejalaController::class, 'indexPakar'])->name('pakar.gejala.index');
    Route::put('/gejala/{id_gejala}/verify', [GejalaController::class, 'verify'])->name('pakar.gejala.verify');
    
    // Solusi routes - add pakar prefix to route name
    Route::get('/solusi', [SolusiController::class, 'indexPakar'])->name('pakar.solusi.index');
    Route::put('/solusi/{id_solusi}/verify', [SolusiController::class, 'verify'])->name('pakar.solusi.verify');
    
    // Pertanyaan routes - add pakar prefix to route name
    Route::get('/pertanyaan', [PertanyaanController::class, 'indexPakar'])->name('pakar.pertanyaan.index');
    Route::put('/pertanyaan/{id_pertanyaan}/verify', [PertanyaanController::class, 'verify'])->name('pakar.pertanyaan.verify');
    
    // Pengguna routes - add pakar prefix to route name
    // Route::get('/pengguna', function() {
    //     return view('pakar.pengguna');
    // })->name('pakar.pengguna.index');
    
    // Profil route - add pakar prefix to route name
    Route::get('/profil', function() {
        return view('pakar.profil');
    })->name('pakar.profil.index');
});

// User Routes
Route::middleware(\App\Http\Middleware\RoleMiddleware::class . ':user')->group(function () {
    Route::view('/user', 'user.beranda')->name('user.beranda');

    Route::view('/diagnosa', 'user.diagnosa')->name('user.diagnosa');

    Route::get('/pertanyaan', [PertanyaanController::class, 'tampilPertanyaan'])->name('pertanyaan.user');
    Route::post('/output-tingkatan', [DiagnosaController::class, 'prosesDiagnosa'])->name('pertanyaan.proses');
    Route::view('/output-tingkatan', 'user.output-tingkatan')->name('user.output-tingkatan-view');
    Route::get('/output-failed', function () {
            $diagnosaId = session('diagnosa_terakhir');
            $diagnosa = Diagnosa::find($diagnosaId);

            return view('user.output-failed', compact('diagnosa'));
        })->name('user.output-failed');
    Route::view('/output-not-detected', 'user.output-not-detected')->name('user.output-not-detected');
    Route::get('/ulangi-tes', function () {
    session()->forget('diagnosa_terakhir');
    return redirect()->route('pertanyaan.user');
})->name('user.ulangi-tes');

    Route::view('/profil', 'user.profil')->name('user.profil');
});

