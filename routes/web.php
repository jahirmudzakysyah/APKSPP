<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginSiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard-siswa', [DashboardController::class, 'indexSiswa'])->name('dashboard.siswa');



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::middleware('roleAccess:admin')->group(function () {
        Route::get('/spp/cetakpdf', [SppController::class, 'cetakPdf']);
        Route::resource('spp', SppController::class);

        Route::get('/kelas/cetakpdf', [KelasController::class, 'cetakPdf']);
        Route::resource('kelas', KelasController::class);

        Route::get('/petugas/cetakpdf', [PetugasController::class, 'cetakPdf']);
        Route::resource('petugas', PetugasController::class);

        Route::get('/siswa/cetakpdf', [SiswaController::class, 'cetakPdf']);
        Route::resource('siswa', SiswaController::class);
    });

    Route::get('/pembayaran/history', [PembayaranController::class, 'history']);
    Route::get('/pembayaran/cetakpdf', [PembayaranController::class, 'cetakPdf']);
    Route::resource('pembayaran', PembayaranController::class);
});

Route::get('/login-siswa', [LoginSiswaController::class, 'index']);
Route::post('/login-siswa', [LoginSiswaController::class, 'store'])->name('login.siswa');
Route::get('/logout-siswa', [LoginSiswaController::class, 'destroy'])->name('logout.siswa');

Route::get('/pembayaran/history', [PembayaranController::class, 'historySiswa']);

require __DIR__ . '/auth.php';
