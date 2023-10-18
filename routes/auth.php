<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, '_auth'])->name('views.login.show');
Route::get('/forgot', [AuthController::class, '_forgot'])->name('views.forgot.show');
Route::get('/reset/{token}', [AuthController::class, '_reset'])->name('views.reset.show');

Route::post('/login', [AuthController::class, 'auth'])->name('actions.login.show');
Route::post('/forgot', [AuthController::class, 'forgot'])->name('actions.forgot.show');
Route::post('/reset/{token}', [AuthController::class, 'reset'])->name('actions.reset.show');
