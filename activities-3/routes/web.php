<?php

use App\Http\Controllers\FormController;

Route::get('/course-registration', [FormController::class, 'create']);
Route::post('/course-registration', [FormController::class, 'store']);
