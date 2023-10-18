<?php

use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/types', [TypeController::class, 'index'])->name('views.types.show');

Route::post('/types/update', [TypeController::class, 'update'])->name('actions.types.edit');
