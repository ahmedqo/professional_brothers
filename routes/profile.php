<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [ProfileController::class, 'edit'])->name('views.profile.edit');
Route::get('/password', [ProfileController::class, 'password'])->name('views.profile.password');

Route::post('/profile', [ProfileController::class, 'update'])->name('actions.profile.update');
Route::post('/password', [ProfileController::class, 'change'])->name('actions.profile.change');
