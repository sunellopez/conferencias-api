<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\AuthController;

// Rutas públicas (no requieren autenticación)
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix('conferencias')->group(function () {
    Route::get('/', [ConferenciaController::class, 'index']); // todas las conferencias
    Route::post('/registrar', [ConferenciaController::class, 'store']); // registrar usuario
    Route::get('/{id}/inscritos', [ConferenciaController::class, 'inscritos']); // inscritos a una conferencia
    Route::get('/usuarios-con-conferencias', [ConferenciaController::class, 'usersWithConferencias']);
});
// Rutas protegidas (requieren token válido)
Route::middleware('auth:api')->group(function () {

    // Perfil y sesión
    Route::get('/user', [AuthController::class, 'profile']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    // Conferencias
    Route::prefix('conferencias')->group(function () {
        Route::get('/{id}', [ConferenciaController::class, 'show']); // detalles de una conferencia
    });
});