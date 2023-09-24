<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CityController;
use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\MonthController;
use App\Http\Controllers\Api\v1\StaffStatusController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {
    Route::controller(AuthController::class)->prefix('auth')->group(function () {
        Route::post('/set-password', 'setPassword');
        Route::post('/login', 'login');
        Route::post('/logout', 'logout');
        Route::get('/refresh-token', 'refresh');
    });

    Route::controller(CityController::class)->prefix('cities')->group(function(){
        Route::get('/', 'index');
        Route::get('/by-city/{cityId?}', 'byCity');
    });

    Route::get('/months', [MonthController::class, 'index']);
    Route::get('/staff-statuses', [StaffStatusController::class, 'index']);

    Route::get('/customers', [CustomerController::class, 'index']);
});
