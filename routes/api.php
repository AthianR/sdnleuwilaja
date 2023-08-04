<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\API\jenisSoalController;
use App\Http\Controllers\API\SoalQuizController;
use App\Http\Controllers\API\LeaderboardController;
use App\Http\Controllers\API\ProgressPemainController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/siswa', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function(){
    Route::post('test', [AuthController::class, 'test']);
});

Route::post('login', [AuthController::class, 'login'])->name('authLogin');
Route::post('register', [AuthController::class, 'register']);

Route::post('loginsiswa', [SiswaController::class, 'login']);
Route::post('registersiswa', [SiswaController::class, 'register']);
Route::get('logoutsiswa', [SiswaController::class, 'logout'])->middleware('auth:sanctum');;
Route::get('siswa/{siswa}', [SiswaController::class, 'siswaById'])->middleware('auth:sanctum');

Route::apiResource('jenisSoal', JenisSoalController::class)->middleware('auth:sanctum');
Route::apiResource('soalQuiz', SoalQuizController::class)->middleware('auth:sanctum');
Route::apiResource('leaderboard', LeaderboardController::class)->middleware('auth:sanctum');
Route::apiResource('progressPemain', ProgressPemainController::class)->middleware('auth:sanctum');

Route::get('soalQuizBy/{SoalQuiz}', [SoalQuizController::class, 'showByjenisQuiz'])->middleware('auth:sanctum');
Route::get('leaderboardBy/{Leaderboard}', [LeaderboardController::class, 'showByJenisSoal'])->middleware('auth:sanctum');
Route::get('leaderboardBySiswa/{Leaderboard}/{Siswa}', [LeaderboardController::class, 'showByJenisSoalSiswa'])->middleware('auth:sanctum');
Route::get('progresspemainBySiswa/{ProgressPemain}/{Siswa}', [ProgressPemainController::class, 'showByJenisSoalSiswa'])->middleware('auth:sanctum');
