<?php

declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use Mortezaa97\Reviews\Http\Controllers\ReviewController;

// Review Routes
Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
Route::match(['put', 'patch'], 'reviews/{review}', [ReviewController::class, 'update'])->middleware('auth:api')->name('reviews.update');
Route::post('reviews', [ReviewController::class, 'store'])->middleware('auth:api')->name('reviews.store');
