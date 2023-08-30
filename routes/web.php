<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/daftar/siswa', [HomeController::class, 'siswa'])->name('daftar.siswa')->middleware('auth');

Route::get('/daftar/siswa/{id}', [HomeController::class, 'tampil'])->name('tampil.siswa')->middleware('auth');

Route::get('/daftar/soal', [HomeController::class, 'soal'])->name('daftar.soal')->middleware('auth');
Route::get('/daftar/leaderboard', [HomeController::class, 'leaderboard'])->name('daftar.leaderboard')->middleware('auth');
Route::get('/daftar/progres', [HomeController::class, 'progres'])->name('daftar.progres')->middleware('auth');
Route::get('/data/download/{format}', [HomeController::class, 'download'])->name('data.download')->middleware('auth');
Route::post('/add/data/siswa', [HomeController::class, 'storeSiswa'])->name('add.siswa')->middleware('auth');
Route::post('/add/data/soal', [HomeController::class, 'storeSoal'])->name('add.soal')->middleware('auth');
Route::delete('/destroy/siswa/{id}', [HomeController::class, 'destroySiswa'])->name('destroy.siswa')->middleware('auth');
Route::delete('/destroy/soal/{id}', [HomeController::class, 'destroySoal'])->name('destroy.soal')->middleware('auth');
Route::get('/edit/soal/{id}', [HomeController::class, 'editSoal'])->name('edit.soal')->middleware('auth');
Route::get('/edit/siswa/{id}', [HomeController::class, 'editSiswa'])->name('edit.siswa')->middleware('auth');
Route::put('/update/soal/{id}', [HomeController::class, 'updateSoal'])->name('update.soal')->middleware('auth');
Route::put('/update/siswa/{id}', [HomeController::class, 'updateSiswa'])->name('update.siswa')->middleware('auth');
Route::get('/progress', [HomeController::class, 'getProgres']);
