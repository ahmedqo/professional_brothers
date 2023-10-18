<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/users', [UserController::class, 'index'])->name('views.users.show');
Route::get('/users/create', [UserController::class, 'create'])->name('views.users.create');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('views.users.edit');

Route::post('/users/create', [UserController::class, 'store'])->name('actions.users.create');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('actions.users.update');
Route::get('/users/{id}/delete', [UserController::class, 'destroy'])->name('actions.users.destroy');
