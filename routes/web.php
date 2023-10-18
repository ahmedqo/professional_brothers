<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['lang']], function () {
    require __DIR__ . '/guest.php';

    Route::group(["prefix" => "admin"], function () {
        Route::group(['middleware' => ['guest']], function () {
            require __DIR__ . '/auth.php';
        });

        Route::group(['middleware' => ['auth']], function () {
            Route::get('/logout', [AuthController::class, 'logout'])->name('actions.logout.show');
            require __DIR__ . '/profile.php';
            require __DIR__ . '/user.php';
            require __DIR__ . '/gallery.php';
            require __DIR__ . '/offer.php';
            require __DIR__ . '/type.php';
        });
    });
});
