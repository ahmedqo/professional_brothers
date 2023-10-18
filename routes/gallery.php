<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/gallery', [GalleryController::class, 'index'])->name('views.gallery.show');

Route::post('/gallery/create', [GalleryController::class, 'create'])->name('actions.gallery.create');
Route::post('/gallery/destroy', [GalleryController::class, 'destroy'])->name('actions.gallery.destroy');
