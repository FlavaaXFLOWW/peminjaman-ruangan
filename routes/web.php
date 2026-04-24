<?php

use Illuminate\Support\Facades\Route;

// Controller Utama
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; // Controller "Router"
use App\Http\Controllers\BookingController;   // Untuk Dosen/Mahasiswa

// Controller Khusus Admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ActivityTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookingManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute Halaman Depan (Sudah Diperbaiki)
Route::get('/', function () {
    // Mengarahkan pengguna langsung ke halaman login saat mengakses root URL
    return redirect()->route('login');
});

// Rute Dashboard Utama (Breeze)
// Kita arahkan ke DashboardController yang akan memilah tampilan berdasarkan peran
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rute yang Membutuhkan Login (Umum)
Route::middleware('auth')->group(function () {
    // Rute Profil Bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // === 🚀 GRUP RUTE KHUSUS ADMIN ===
    // Dilindungi oleh prefix 'admin', nama 'admin.', dan middleware 'role:admin'
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // CRUD Master Data
        Route::resource('rooms', RoomController::class);
        Route::resource('activity-types', ActivityTypeController::class);
        Route::resource('users', UserController::class); // Mengelola Dosen/Mahasiswa

        // Manajemen Peminjaman (Approve/Reject)
        Route::get('bookings', [BookingManagementController::class, 'index'])->name('bookings.index');
        Route::patch('bookings/{booking}/approve', [BookingManagementController::class, 'approve'])->name('bookings.approve');
        Route::patch('bookings/{booking}/reject', [BookingManagementController::class, 'reject'])->name('bookings.reject');
        
        // Rute Laporan (bisa ditambahkan di sini)
        // Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    });

    // === 👨‍🏫 GRUP RUTE DOSEN & MAHASISWA 👩‍🎓 ===
    // Dilindungi oleh middleware 'role:dosen,mahasiswa'
    Route::middleware('role:dosen,mahasiswa')->group(function () {
        
        // Pengajuan Peminjaman
        Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
        Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');

        // Riwayat Peminjaman Saya
        Route::get('my-bookings', [BookingController::class, 'index'])->name('bookings.index');
        Route::get('my-bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

        // Pembatalan Peminjaman
        Route::patch('my-bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    });
});

// File rute autentikasi bawaan Breeze
require __DIR__.'/auth.php';