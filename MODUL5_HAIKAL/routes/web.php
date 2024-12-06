<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

// Halaman Utama
Route::get('/', function () {
    return redirect()->route('dosens.index');
});

// Routes CRUD Dosen
Route::prefix('dosens')->name('dosens.')->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('index'); // Tampilkan semua data dosen
    Route::get('/create', [DosenController::class, 'create'])->name('create'); // Tampilkan form tambah dosen
    Route::post('/', [DosenController::class, 'store'])->name('store'); // Simpan data dosen baru
    Route::get('/{id}', [DosenController::class, 'show'])->name('show'); // Tampilkan detail dosen
    Route::get('/{id}/edit', [DosenController::class, 'edit'])->name('edit'); // Tampilkan form edit dosen
    Route::put('/{id}', [DosenController::class, 'update'])->name('update'); // Update data dosen
    Route::delete('/{id}', [DosenController::class, 'destroy'])->name('destroy'); // Hapus data dosen
});

// Routes CRUD Mahasiswa
Route::prefix('mahasiswas')->name('mahasiswas.')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('index'); // Tampilkan semua data mahasiswa
    Route::get('/create', [MahasiswaController::class, 'create'])->name('create'); // Tampilkan form tambah mahasiswa
    Route::post('/', [MahasiswaController::class, 'store'])->name('store'); // Simpan data mahasiswa baru
    Route::get('/{id}', [MahasiswaController::class, 'show'])->name('show'); // Tampilkan detail mahasiswa
    Route::get('/{id}/edit', [MahasiswaController::class, 'edit'])->name('edit'); // Tampilkan form edit mahasiswa
    Route::put('/{id}', [MahasiswaController::class, 'update'])->name('update'); // Update data mahasiswa
    Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('destroy'); // Hapus data mahasiswa
});