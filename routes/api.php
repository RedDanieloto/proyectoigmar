<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Ruta para el registro de usuario
Route::post('/register', [AuthController::class, 'register']);

// Ruta para la activación de cuenta
Route::get('/activate/{token}', [AuthController::class, 'activate']);
