<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', [GuestController::class, 'home'])->name('views.home.show');
Route::get('/services', [GuestController::class, 'service'])->name('views.services.show');
Route::get('/works', [GuestController::class, 'work'])->name('views.works.show');
Route::get('/prices', [GuestController::class, 'price'])->name('views.prices.show');
Route::get('/offers', [GuestController::class, 'offer'])->name('views.offers.guest.show');

Route::post('/contact', [GuestController::class, 'contact'])->name('actions.contact.show');


Route::get('/language/{locale}', function ($locale) {
    app()->setlocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('actions.language.show');
