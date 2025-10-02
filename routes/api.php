<?php

declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use Mortezaa97\Reviews\Http\Controllers\ReviewController;

Route::prefix('api/reviews')->middleware('api')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/{review}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::match(['put', 'patch'], '/{review}', [ReviewController::class, 'update'])->middleware('auth:api')->name('reviews.update');
    Route::post('/', [ReviewController::class, 'store'])->middleware('auth:api')->name('reviews.store');
});
