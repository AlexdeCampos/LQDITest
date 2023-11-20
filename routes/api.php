<?php

use App\Http\Controllers\LeadsController;
use Illuminate\Support\Facades\Route;

Route::controller(LeadsController::class)->group(function () {
    Route::post('/leads/{id}', 'sendEmail');
    Route::get('/leads', 'list');
    Route::post('/leads', 'store');
});