<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/create', [ItemController::class, 'create']);
Route::post('/items/store', [ItemController::class, 'store']);

Route::get('/items/{id}', [ItemController::class, 'show']);
Route::get('/items/{id}/edit', [ItemController::class, 'edit']);
Route::post('/items/{id}/update', [ItemController::class, 'update']);
Route::get('/items/{id}/delete', [ItemController::class, 'destroy']);