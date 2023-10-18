<?php

use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

Route::get('/offers', [OfferController::class, 'index'])->name('views.offers.show');

Route::post('/offers/create', [OfferController::class, 'create'])->name('actions.offers.create');
Route::post('/offers/destroy', [OfferController::class, 'destroy'])->name('actions.offers.destroy');
