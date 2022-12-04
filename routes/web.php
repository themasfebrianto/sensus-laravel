<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PeringkatController;
use App\Http\Controllers\ProfileController;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => redirect()->route('login'));


Route::middleware('auth')->group(
    function () {
        Route::get(
            '/dashboard',
            [DashboardController::class, 'index']
        )->name('dashboard');
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(
    function () {
        Route::get('/kabupaten/search', [KabupatenController::class, 'search'])->name('kabupaten.search');
        Route::get('/kabupaten/cetak_pdf', [KabupatenController::class, 'cetak_pdf'])->name('kabupaten.cetakpdf');
        Route::get('/kabupaten', [KabupatenController::class, 'index'])->name('kabupaten.index');
        Route::resource("/kabupaten", KabupatenController::class);
    }
);
Route::middleware('auth')->group(
    function () {
        Route::get('/kecamatan/search', [KecamatanController::class, 'search'])->name('kecamatan.search');
        Route::get('/kecamatan/cetak_pdf', [KecamatanController::class, 'cetak_pdf'])->name('kecamatan.cetakpdf');
        Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
        Route::resource("/kecamatan", KecamatanController::class);
    }
);
Route::middleware('auth')->group(
    function () {
        Route::get('/peringkat', [PeringkatController::class, 'index'])->name('peringkat.index');
    }
);

require __DIR__ . '/auth.php';
