<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CityController;
use App\Http\Controllers\Api\v1\CounterController;
use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\MeterDataController;
use App\Http\Controllers\Api\v1\MonthController;
use App\Http\Controllers\Api\v1\StaffStatusController;
use App\Http\Controllers\Api\v1\TariffController;
use App\Http\Controllers\Api\v1\WaterSourceController;
use App\Http\Controllers\Api\v1\WaterSupplierController;
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

    Route::controller(MeterDataController::class)->prefix('meter-data')->group(function(){
        Route::get('/{page?}', 'index');
        Route::post('/meter-data/store', 'store')->middleware('auth:api');
    });

    Route::get('/months', [MonthController::class, 'index']);
    Route::get('/tariffs', [TariffController::class, 'index']);
    Route::get('/water-suppliers', [WaterSupplierController::class, 'index']);
    Route::get('/water-sources', [WaterSourceController::class, 'index']);
    Route::get('/staff-statuses', [StaffStatusController::class, 'index']);
    Route::get('/counters', [CounterController::class, 'index']);
    Route::get('/customers', [CustomerController::class, 'index']);
});
