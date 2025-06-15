<?php

use App\Http\Controllers\AturanController;
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


Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'pakar':
                return redirect()->route('pakar.dashboard');
            case 'user':
                return redirect()->route('user.beranda');
            default:
                Auth::logout();
                return redirect()->route('login');
        }
    }
    return view('welcome-page');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout')->middleware('auth');

Route::middleware(['throttle:30,1'])->group(function () {
    Route::get('/css/{path}', function ($path) {
        $file = public_path("css/{$path}");
        if (!file_exists($file)) {
            abort(404);
        }
        return response()->file($file, [
            'Content-Type' => 'text/css',
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    })->where('path', '.*');

    Route::get('/images/{path}', function ($path) {
        $file = public_path("images/{$path}");
        if (!file_exists($file)) {
            abort(404);
        }
        $mimeType = mime_content_type($file);
        return response()->file($file, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    })->where('path', '.*');
});

Route::prefix('admin')->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

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
        Route::get('/{user_id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user_id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user_id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('hasil-diagnosa')->name('admin.hasil.')->group(function () {
        Route::get('/', [HasilDiagnosaController::class, 'index'])->name('index');
        Route::delete('/{id}', [HasilDiagnosaController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('hasil-gejala')->name('admin.hasilgejala.')->group(function () {
        Route::get('/', [HasilGejalaController::class, 'index'])->name('index');
        Route::delete('/{id}', [HasilGejalaController::class, 'destroy'])->name('destroy');
    });

    Route::get('/profil', function () {
        return view('admin.profil');
    })->name('admin.profil.index');
});

Route::prefix('pakar')->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':pakar'])->group(function () {
    Route::get('/', function () {
        return view('pakar.dashboard');
    })->name('pakar.dashboard');

    Route::get('/diagnosa', [DiagnosaController::class, 'indexPakar'])->name('pakar.diagnosa.index');
    Route::put('/diagnosa/{id}/verify', [DiagnosaController::class, 'updatePakar'])->name('pakar.diagnosa.verify');

    Route::get('/gejala', [GejalaController::class, 'indexPakar'])->name('pakar.gejala.index');
    Route::put('/gejala/{id_gejala}/verify', [GejalaController::class, 'verify'])->name('pakar.gejala.verify');

    Route::get('/solusi', [SolusiController::class, 'indexPakar'])->name('pakar.solusi.index');
    Route::put('/solusi/{id_solusi}/verify', [SolusiController::class, 'verify'])->name('pakar.solusi.verify');

    Route::get('/pertanyaan', [PertanyaanController::class, 'indexPakar'])->name('pakar.pertanyaan.index');
    Route::put('/pertanyaan/{id_pertanyaan}/verify', [PertanyaanController::class, 'verify'])->name('pakar.pertanyaan.verify');

    Route::get('/aturan', [AturanController::class, 'index'])->name('pakar.aturan.index');
    Route::post('/aturan', [AturanController::class, 'store'])->name('pakar.aturan.store');
    Route::delete('/aturan/{id}', [AturanController::class, 'destroy'])->name('pakar.aturan.destroy');

    Route::get('/profil', function () {
        return view('pakar.profil');
    })->name('pakar.profil.index');
});

Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/user', function () {
        return view('user.beranda');
    })->name('user.beranda');

    Route::get('/diagnosa', function () {
        return view('user.diagnosa');
    })->name('user.diagnosa');

    Route::middleware(['throttle:10,1'])->group(function () {
        Route::get('/pertanyaan', [PertanyaanController::class, 'tampilPertanyaan'])->name('pertanyaan.user');
        Route::post('/output-tingkatan', [DiagnosaController::class, 'prosesDiagnosa'])->name('pertanyaan.proses');

        Route::get('/ulangi-tes', function () {
            $userId = Auth::id();
            if (session()->has('diagnosa_terakhir')) {
                session()->forget([
                    'diagnosa_terakhir',
                    'jawaban_user',
                    'hasil_diagnosa',
                    'pertanyaan_terjawab',
                    "diagnosa_progress_{$userId}",
                    'loop_prevention_App\Http\Controllers\PertanyaanController::tampilPertanyaan'
                ]);
                session()->save();
            }
            return redirect()->route('pertanyaan.user')->with('success', 'Progress tes telah direset.');
        })->name('user.ulangi-tes');

        Route::get('/reset-progress', [PertanyaanController::class, 'resetProgress'])->name('user.reset-progress');
    });

    Route::get('/output-tingkatan', function () {
        return view('user.output-tingkatan');
    })->name('user.output-tingkatan-view');

    Route::get('/output-failed', function () {
        $diagnosaId = session('diagnosa_terakhir');
        $diagnosa = null;
        if ($diagnosaId) {
            $diagnosa = Diagnosa::find($diagnosaId);
        }
        return view('user.output-failed', compact('diagnosa'));
    })->name('user.output-failed');

    Route::get('/output-not-detected', function () {
        return view('user.output-not-detected');
    })->name('user.output-not-detected');

    Route::get('/profil', function () {
        return view('user.profil');
    })->name('user.profil');
});