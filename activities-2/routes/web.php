<?php

use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::resource('students', StudentController::class);
});

require __DIR__.'/auth.php';