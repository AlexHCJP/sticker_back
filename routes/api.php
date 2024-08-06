<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\StickerController;

Route::controller(CategoryController::class)->prefix('category')->group(function () {
    Route::get('/', 'get');
    Route::post('/create', 'create');
});

Route::controller(PacketController::class)->prefix('packet')->group(function () {
    Route::get('/', 'get');
    Route::get('/{packet}', 'show');
    Route::post('/create', 'create');
});

Route::controller(StickerController::class)->prefix('sticker')->group(function () {
    Route::post('/create', 'create');
});