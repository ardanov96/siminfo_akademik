<?php

use App\Http\Controllers\UserMahasiswaController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;

use App\Http\Controllers\Auth\Mahasiswa\AuthenticatedSessionController as MahasiswaAuthSessionController;
use App\Http\Controllers\Auth\Mahasiswa\RegisteredUserController as MahasiswaRegisteredUserController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Mahasiswa - Guard 'mahasiswa')
|--------------------------------------------------------------------------
| Rute khusus untuk login dan register Mahasiswa.
*/
Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::middleware('guest:mahasiswa')->group(function () {
        Route::get('login', [MahasiswaAuthSessionController::class, 'create'])->name('login');
        Route::post('login', [MahasiswaAuthSessionController::class, 'store']);

        Route::get('register', [MahasiswaRegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [MahasiswaRegisteredUserController::class, 'store']);
    });

    Route::post('logout', [MahasiswaAuthSessionController::class, 'destroy'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Mahasiswa - Guard 'mahasiswa')
|--------------------------------------------------------------------------
| Rute yang memerlukan autentikasi untuk Mahasiswa.
*/
Route::middleware(['auth:mahasiswa'])->group(function () {
    // Dashboard Mahasiswa
    Route::get('/dashboard-mahasiswa', function () {
        // Anda bisa merender komponen Inertia spesifik untuk dashboard mahasiswa
        return Inertia::render('DashboardMahasiswa'); // Pastikan komponen ini ada
    })->name('mahasiswa.dashboard');
});


/*
|--------------------------------------------------------------------------
| Authenticated Routes (Dosen/Admin - Guard 'web')
|--------------------------------------------------------------------------
| 
*/
Route::middleware(['auth', 'verified'])->group(function () 
{
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('mata-kuliah', MataKuliahController::class);

    Route::resource('mahasiswa', UserMahasiswaController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
