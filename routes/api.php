<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadsController;
use Illuminate\Support\Facades\Route;



Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'auth');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::post('/register', 'store');
});


Route::controller(LeadsController::class)->group(function () {
    Route::post('/leads/{id}', 'sendEmail')->middleware('auth:sanctum');
    Route::get('/leads', 'list')->middleware('auth:sanctum');
    Route::post('/leads', 'store');
});

