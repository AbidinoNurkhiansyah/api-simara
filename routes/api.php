<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MadrasahController;
use App\Http\Controllers\TempatIbadahController;
use App\Http\Controllers\MonthlyStatController;

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::apiResource('programs', ProgramController::class)->only(['index', 'show']);
Route::apiResource('services', ServiceController::class)->only(['index', 'show']);
Route::apiResource('madrasahs', MadrasahController::class)->only(['index', 'show']);
Route::apiResource('tempat-ibadahs', TempatIbadahController::class);
Route::get('stats', [MonthlyStatController::class, 'getStats']);

use App\Http\Controllers\PernikahanController;
Route::apiResource('pernikahans', PernikahanController::class);
