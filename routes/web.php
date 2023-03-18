<?php

// Admin Controller
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;

// User Controller
use App\Http\Controllers\User\EmailController;
use App\Http\Controllers\User\SocialController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [UserController::class, 'index'])->name('pekat.index');

Route::post('/masyarakat/sendverification', [EmailController::class, 'sendVerification'])->name('pekat.sendVerification');
Route::get('/masyarakat/verify/{nik}', [EmailController::class, 'verify'])->name('pekat.verify');

Route::middleware(['isMasyarakat'])->group(function () {
    // Profile
    Route::resource('profile', ProfileController::class);
    
    // Pengaduan
    Route::post('/store', [UserController::class, 'storePengaduan'])->name('pekat.store');
    Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');
    
    // Logout Masyarakat
    Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');
});

Route::middleware(['guest'])->group(function () {
    // Login Masyarakat
    Route::get('/login', [UserController::class, 'formLogin'])->name('pekat.formLogin');
    Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');
    
    // Register
    Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
    Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');
    
    // Media Sosial
    Route::get('auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('pekat.auth');
    Route::get('auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

    // Lapor
    Route::get('/lapor', [UserController::class, 'lapor'])->name('pekat.lapor');
    Route::post('/lapor/store', [UserController::class, 'storePengaduan'])->name('pekat.storeLapor');
});

// Route dengan tambahan /admin/(nama route)
Route::prefix('admin')->group(function () {

    Route::middleware(['isAdmin'])->group(function () {
        // Petugas
        Route::resource('petugas', PetugasController::class);

        // Kategori
        Route::resource('kategori', KategoriController::class);

        // Masyarakat
        Route::resource('masyarakat', MasyarakatController::class);

        // Laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
    });

    Route::middleware(['isPetugas'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // Pengaduan
        Route::resource('pengaduan', PengaduanController::class);

        // Tanggapan
        Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');

        // Logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    Route::middleware(['isGuest'])->group(function () {
        Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
