<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/items', [ItemController::class, 'index'])->name('api.items.index');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('api.items.show');

Route::get('/listings', [ListingController::class, 'index'])->name('api.listings.index');
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('api.listings.show');
